<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

use App\Jurisdiction;
use App\Seeker;
use App\UserPermission;

use App\Jobs\EmailJob;

use App\Traits\CanLike;
use App\Traits\CanEditCv;

class User extends Authenticatable
{
    use Notifiable, CanLike, CanEditCv;
    
    protected $fillable = [
        'name', 'username', 'email', 'password','avatar','email_verification','email_verified_at','password','created_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }

    public function userPermission(){
        return $this->hasOne(UserPermission::class);
    }

    public function inviteLinks(){
        return $this->hasMany(InviteLink::class);
    }

    public function cvEditor(){
        return $this->hasOne(CvEditor::class);
    }

    public function getInviteTextAttribute(){
        return $this->name . ' invited you to Emploi, an Efficient Platform to perform recruitments and find work for a successful career ';
    }

    public function companies(){
        return $this->hasMany(Company::class);
    }

    public function blogs(){
        return $this->hasMany(Blog::class);
    }

    public function credits(){
        return $this->hasMany(Credit::class);
    }

    public function referrals(){
        return $this->hasMany(Referral::class);
    }

    public function getTotalCreditsAttribute(){
        $total = 0;
        if(count($this->credits) == 0)
            return 0;
        foreach($this->credits as $c)
            $total += $c->value;
        return $total;
    }

    public function getRoleAttribute(){
        //dd($this->userPermission->permission->role);
        $perm = $this->userPermission;
        return $perm->permission->role;
        if($perm->status == 'active')
            return $perm->permission->role;
        return 'guest';
    }

    public function getEmployerAttribute(){
        if($this->role == 'employer')
            return Employer::where('user_id',$this->id)->first();
        return false;
    }


    public function getPostsAttribute(){
        if($this->role == 'employer' || $this->role == 'admin')
        {
            $company = Company::where('user_id',$this->id)->first();
            if(isset($company->id))
            {
                return $company->posts;
            }
        }
        return [];
    }

    public function applications(){
        return $this->hasMany(JobApplication::class);
    }

    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getPublicAvatarUrl(){
        return $this->avatar ? '/storage/avatars/'.$this->avatar : '/images/avatar.png';
    }

    public static function admins(){
        $admins = [];
        foreach(User::all() as $user)
        {
            if($user->role == 'admin')
                array_push($admins, $user);
        }
        return $admins;
    }

    public static function inactiveAdmins(){
        $admins = [];
        foreach(User::all() as $user)
        {
            if($user->userPermission->permission_id == 2 && $user->userPermission->status == 'inactive')
            {
                array_push($admins, $user);
            }
        }
        return $admins;
    }

    public function getJurisdictionsAttribute(){
        if($this->role == 'admin')
        {
            $perm = $this->userPermission;
            return Jurisdiction::where('user_permission_id',$perm->id)
                    ->get();
        }
        return [];
    }

    public function getSeekerAttribute(){
        if(!$this->role == 'seeker')
            return false;
        return Seeker::where('user_id',$this->id)->first();
    }

    public function verifyAccount(){
        $this->email_verified_at = now();
        $this->save();

        if($this->role == 'seeker')
        {
            $caption = "Glad to have you on board, Employers are searching on our platform";
            $contents = "

            Welcome to Emploi, we're excited to have you on board. <br>

            We have solutions tailored for your career, including Professional CV Editing, Premium Placement and much more. 
            <br>
            Have a look around and <a href='".url('/contact')."'>contact us</a> for support should you need it.
            <br><br>
            Update your profile and start applying for jobs. Employers are always recruiting on our platform, ensure you upload your updated resume.
            ";
            EmailJob::dispatch($this->name, $this->email, 'Warm Welcome to Emploi', $caption, $contents);
        }

        if($this->role == 'employer')
        {
            $caption = "Welcome to Emploi";
            $contents = "

            First of let me introduce myself – My name is Margaret Ongachi, I will be your main point of contact moving forward.
            <br>
            I see you have started the registration process on our website as an employer. Here at Emploi, we make your recruitment journey Fast and Efficient.  

            <br>
            If you have any questions or would like some help then please feel free to reach me via email or phone as highlighted below.
            <br><br>
            <b>Margaret Ongachi</b>
            Email: <a href='mailto:margaret@emploi.co'>margaret@emploi.co</a>
            Phone: +254 702 068 282 <br><br>
            Glad to have you on board
            <b></b>
            ";
            EmailJob::dispatch($this->name, $this->email, 'Welcome to Emploi', $caption, $contents);
        }
        return true;
    }

    public static function subscriptionStatus($email){
        $sql = "SELECT * FROM unsubscriptions WHERE email = \"$email\" LIMIT 1";
        $result = DB::select($sql);
        if(count($result) == 1)
        {
            if($result[0]->status == 'active')
            {
                return false;
            }
            
        }
        return true;
    }

    public static function unsubscribeEmails($email){
        $sql = "SELECT * FROM unsubscriptions WHERE email = \"$email\" LIMIT 1";
        $result = DB::select($sql);
        if(count($result) == 1)
        {
            if($result[0]->status == 'inactive')
            {
                $sql = "UPDATE unsubscriptions SET status = \"active\" WHERE email = \"$email\" LIMIT 1";
                DB::update($sql);
            }
            return true;  
        }
        else
        {
            $sql = "INSERT INTO unsubscriptions (email,status) VALUES (\"$email\",\"active\")";
            DB::insert($sql);
            return true;
        }
    }

    public static function subscribeEmails($email){
        $sql = "SELECT * FROM unsubscriptions WHERE email = \"$email\" LIMIT 1";
        $result = DB::select($sql);
        if(count($result) == 1)
        {
            if($result[0]->status == 'active')
            {
                $sql = "UPDATE unsubscriptions SET status = \"inactive\" WHERE email = \"$email\" LIMIT 1";
                DB::update($sql);
            }
        }
        return true;  
    }

    public static function cleanEmail($string) {
        //return iconv(mb_detect_encoding($string, mb_detect_order(), true), "UTF-8", $output);
        $string = str_replace(' ', '', $string);

        return preg_replace('/[^A-Za-z0-9\-.@]/', '', $string);
    }
}
