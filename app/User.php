<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Jurisdiction;
use App\Seeker;
use App\UserPermission;

use App\Jobs\EmailJob;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'username', 'email', 'password','avatar','email_verification','email_verified_at','password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userPermission(){
        return $this->hasOne(UserPermission::class);
    }

    public function companies(){
        return $this->hasMany(Company::class);
    }

    public function blogs(){
        return $this->hasMany(Blog::class);
    }

    public function getRoleAttribute(){
        $perm = $this->userPermission;
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
            $caption = "Glad to have you on board";
            $contents = "

            Welcome to Emploi. We've streamlined the recruitment process and introduced the Role Suitability Index which ranks applicants. <br>
            ";
            EmailJob::dispatch($this->name, $this->email, 'Warm Welcome to Emploi', $caption, $contents);
        }
        return true;
    }
}
