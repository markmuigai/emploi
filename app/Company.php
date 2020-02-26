<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Watson\Rememberable\Rememberable;
use DB;

use App\Post;
use App\ProductOrder;

use App\Jobs\EmailJob;

class Company extends Model
{
    use Rememberable;
    public $rememberFor = 30;
    protected $fillable = [
        'name', 'user_id', 'logo', 'cover','tagline', 'about','website', 'industry_id','company_size_id','location_id','status','phone_number','email','featured'
    ];

    public function getEmail(){
        return $this->email ? $this->email : $this->user->email;
    }

    public function getPhone(){
        return $this->phone_number ? $this->phone_number : $this->user->employer->company_phone;
    }

    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }

    public function getWebsite(){

        return ($this->website == 'http://emploi.co' || $this->website == null) ? url('/companies/'.$this->name) : $this->website;
    }

    public function industry(){
    	return $this->belongsTo(Industry::class,'industry_id');
    }

    public function location(){
    	return $this->belongsTo(Location::class,'location_id');
    }

    public function companySize(){
    	return $this->belongsTo(CompanySize::class,'company_size_id');
    }

    public function isFeatured(){
        if($this->featured != null)
            return true;
        return false;
    }

    public function makeFeatured(ProductOrder $po){
        if($this->isFeatured())
            return false;
        if($po->product->slug != 'featured_company' || $po->contents != null)
            return false;
        $until = now()->add($po->product->days_duration,'day');
        $po->contents = $this->id.'_'.$until;
        if($po->save())
        {
            $this->featured = 1;
            if($this->save())
            {
                $caption = $company->name." is now a Featured Company on Emploi";
                $contents = $company->name." has been highlighted for Job seekers on Emploi.
                <br>
                Visitors to our site will more likely see your company and job adverts on Emploi. This service will be active for ".$po->product->days_duration." days until $until.

                <p>If you require further information on your job applications, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                Thank you for choosing Emploi.

                <br>";
                EmailJob::dispatch( $po->order->first_name.' '.$po->order->last_name, $po->order->email, 'Featured Company Package Activated', $caption, $contents);
                return true;
            }
            else
            {
                $po->contents = null;
                $po->save();
            }
            
        }
        return false;       
        
    }

    public function getHiringAttribute(){
        $hiring = false;
        if($this->status != 'active')
            return false;
        for($i=0; $i<count($this->posts);$i++)
        {
            if($this->posts[$i]->status == 'active')
            {
                $hiring = true;
                break;
            }
        }
        return $hiring;
    }

    public static function getHiringCompanies($counter = 10){
        $companies = [];
        $allCompanies = Company::all();
        for($i=0; $i<count($allCompanies); $i++)
        {
            if($counter == 0)
                break;
            if($allCompanies[$i]->hiring)
            {
                array_push($companies, $allCompanies[$i]);
                $counter --;
            }
            
        }
        return $companies;
    }

    public static function getHiringCompanies2($counter = 10){
        $companies = [];
        $limit = "LIMIT $counter";
        if($counter == 0)
            $limit = '';
        $sql = "SELECT DISTINCT company_id, featured, id, created_at, status FROM posts WHERE status = 'active' ORDER BY created_at DESC, featured DESC  $limit";
        $results = DB::select($sql);
        for($i=0; $i<count($results);$i++)
        {
            array_push($companies, $results[$i]->company_id);
        }
        return Company::whereIn('id',$companies)->orderBy('featured','DESC')->get();
    }

    public function posts(){
    	return $this->hasMany(Post::class);
    }

    public function getActivePostsAttribute(){
        return Post::where('status','active')
                ->where('company_id',$this->id)
                ->where('deadline','>',Carbon::now()->format('Y-m-d'))
                ->get();
    }

    public function getStaffAttribute(){
        return $this->companySize->lower_limit.' - '.$this->companySize->upper_limit.' people';
    }

    public function getLogoUrlAttribute(){
        if($this->logo == null)
            return '/images/company-logo.png';
        return '/storage/companies/'.$this->logo;
    }

    public function getCoverUrlAttribute(){
        if($this->cover == null)
            return '/images/email-banner.jpg';
        return '/storage/companies/'.$this->cover;
    }
}
