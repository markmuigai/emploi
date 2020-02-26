<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use App\Company;
use App\Seeker;
use App\User;

use App\Jobs\EmailJob;

class ProductOrder extends Model
{
    protected $fillable = [
        'order_id', 'product_id','days_duration','start_date','price','contents'
    ];

    public function order(){
    	return $this->belongsTo(Order::class);
    }

    public function product(){
    	return $this->belongsTo(Product::class);
    }

    public static function toggle($productOrder, $action = 'activate')
    {
    	$p = $productOrder;
    	$slug = $p->product->slug;
    	$today = now();

    	if($slug == 'featured_seeker' || $slug == 'entry_level_cv_edit' || $slug == 'mid_level_cv_edit' || $slug == 'c_change_cv_edit' || $slug == 's_mgnt_cv_edit' || $slug == 'mgnt_cv_edit' )
    	{
    		if($action == 'activate')
        	{
                $packageUser = User::findOrFail($p->order->user_id);
                if($packageUser->role == 'seeker' && $packageUser->seeker->featured == 0)
                {
                    $p->contents = now()->add($p->days_duration,'day');
                    $p->save();

                    $seeker = $packageUser->seeker;
                    $seeker->featured = 1;
                    $seeker->save();

                    
                    $caption = "You are a Featured Job Seeker on Emploi";
                    $contents = "We have marked your profile as featured on Emploi. Here are the benefits you will get in the coming ".$p->days_duration." days, or until ".$p->contects.". <br>
                    You will receive notifications whenever: <br>
                    <ul>
                        <li>An Employer views your profile</li>
                        <li>You apply for a job</li>
                        <li>An Employer shortlists you for a position</li>
                        <li>An Employer rejects your application, with possible reasons</li>
                        <li>An Employer fails to shortlist your application</li>
                    </ul>

                    <br>

                    Your profile will rank first on our platform. Here are the lists which your profile will be prioritized:
                    <br>
                    <ul>
                        <li>Whenever an employer browses for potential employees</li>
                        <li>Your job application will appear first among'st applicants</li>
                    </ul>


                    <p>
                    Get started by applying <a href='".url('/vacancies/featured')."'>Featured Jobs</a> on Emploi.
                    </p>

                    <p>If you require further information on your job applications, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                    We wish you the very best in your job search. 

                    <br>";
                    EmailJob::dispatch($p->order->email, $p->order->first_name.' '.$p->order->last_name, 'Featured Job Seeker Package Activated', $caption, $contents);
                    
                }
        		
        	}
        	else
        	{
        		$expiry = new Carbon($productOrder->contents);
        		if($today->diff($expiry)->days <= 0)
        		{
        			$p->contents = 'completed';
        			$p->save();
        			Seeker::disableFeaturedUserByUserId($p->order->user_id);

                    $caption = "Your ".$p->product->title." Package has Expired";
                    $contents = "
                    <p>We have removed you from our featured job seekers list as your package has expired. </p>
                    <p>You will no longer receive preferrential notifications from Emploi. To enable this, kindly re-activate this package below.</p>

                    <br>

                    <a href='".url('/checkout?product='.$p->product->slug)."'>Reactivate". $p->product->title ." Package</a>
                     

                    <br><br>

                    <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                    Thank you for choosing Emploi.
                    

                    <br>";
                    EmailJob::dispatch($p->order->email, $p->order->first_name.' '.$p->order->last_name, $p->product->title.' Package Expired', $caption, $contents);
        		}
        		
        	}
    	}
    	if($slug == 'seeker_basic')
    	{
    		if($action == 'activate')
        	{
                $packageUser = User::findOrFail($p->order->user_id);
                if($packageUser->role == 'seeker' && !$packageUser->seeker->canGetNotifications())
                {
                    $p->contents = now()->add($p->days_duration,'day');
                    $p->save();

                    $caption = "Job Seeker Basic Package was activated on Emploi";
                    $contents = "The Job Seeker Basic Package, which enables you to receive comprehensive notifications and feedback from Emploi, has been activated and is functional for the next ".$p->days_duration." days. <br>
                    You will receive notifications whenever: <br>
                    <ul>
                        <li>An Employer views your profile</li>
                        <li>You apply for a job</li>
                        <li>An Employer shortlists you for a position</li>
                        <li>An Employer rejects your application, with possible reasons</li>
                        <li>An Employer fails to shortlist your application</li>
                    </ul>

                    <p>
                    Get started by applying <a href='".url('/vacancies/featured')."'>Featured Jobs</a> on Emploi.
                    </p>

                    <p>If you require further information on your job application, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                    We wish you the very best in your job search. 

                    <br>";
                    EmailJob::dispatch($p->order->email, $p->order->first_name.' '.$p->order->last_name, 'Job Seeker Basic Package Activated', $caption, $contents);
                }
        		

        	}
        	else
        	{
        		$expiry = new Carbon($productOrder->contents);
        		if($today->diff($expiry)->days <= 0)
        		{
        			$p->contents = 'completed';
        			$p->save();

                    $caption = "Job Seeker Basic Package has Expired";
                    $contents = "The Job Seeker Basic Package, which enables you to receive comprehensive notifications and feedback, <b>has expired</b>.
                    <br>
                    You will no longer receive preferrential notifications from Emploi. To enable this, kindly re-activate this package below.
                    <br><br>

                    <a href='".url('/checkout?product='.$p->product->slug)."'>Reactivate Package</a>
                     

                    <br><br>

                    <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                    Thank you for choosing Emploi.

                    <br>";
                    EmailJob::dispatch($p->order->email, $p->order->first_name.' '.$p->order->last_name, 'Job Seeker Basic Package Expired', $caption, $contents);

                    //notification package ended
        		}
                elseif($today->diff($expiry)->days == 1)
                {
                    $caption = "Job Seeker Basic Package is Expiring Tomorrow";
                    $contents = "The Job Seeker Basic Package, which enables you to receive comprehensive notifications and feedback, will expire tomorrow.
                    <br>
                    You will no longer receive preferrential notifications from Emploi. To enable this, kindly re-activate this package below to stay in the know.
                    <br><br>

                    <a href='".url('/checkout?product='.$p->product->slug)."'>Reactivate Package</a>
                     

                    <br><br>

                    <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                    Thank you for choosing Emploi.

                    <br>";
                    EmailJob::dispatch($p->order->email, $p->order->first_name.' '.$p->order->last_name, 'Job Seeker Basic Package is Expiring', $caption, $contents);
                }
        	}

    	}

    	if($slug == 'solo')
    	{
    		if($action == 'activate')
        	{
        		$p->contents = 1;
        		$p->save();
        	}
        	else
        	{
        		if( (int) $p->contents == 0 )
        		{
        			$p->contents = 'completed';
        			$p->save();
        		}
        	}

    	}

    	if($slug == 'stawi')
    	{
    		if($action == 'activate')
        	{
                if($p->order->user->role != 'employer')
        		    $p->contents = "1|50";
                else
                {
                    $employer = $p->order->user->employer;
                    $employer->credits += 5000;
                    if($employer->save())
                    {
                        $p->contents = "1|0";
                    }
                }
        		$p->save();
        	}
        	else
        	{
                $cont_ = $p->contents;
                $cont_ = explode("|", $cont_);


        		if( (int) $cont_[0] == 0 &&  (int) $cont_[0] == 0 )
        		{
        			$p->contents = 'completed';
        			$p->save();
        		}
        	}

    	}

    	if($slug == 'solo_plus')
    	{
    		if($action == 'activate')
        	{
        		$p->contents = 4;
        		$p->save();
        	}
        	else
        	{
        		if( (int) $p->contents == 0 )
        		{
        			$p->contents = 'completed';
        			$p->save();
        		}
        	}

    	}

    	if($slug == 'infinity')
    	{
    		if($action == 'activate')
        	{
        		$p->contents = now()->add($p->days_duration,'day');
            	$p->save();
        	}
        	else
        	{
        		$expiry = new Carbon($productOrder->contents);
        		if($today->diff($expiry)->days <= 0)
        		{
        			$p->contents = 'completed';
        			$p->save();
        		}
        	}

    	}

        if($slug == 'featured_company')
        {
            if($action == 'activate')
            {
                // $p->contents = now()->add($p->days_duration,'day');
                // $p->save();
            }
            else
            {
                $expiry = explode("_", $productOrder->contents);
                $company_id = (int) $expiry[0];

                $expiry = new Carbon($expiry[1]);

                if($today->diff($expiry)->days <= 0)
                {
                    $p->contents = 'completed';
                    $p->save();

                    $company = Company::find($company_id);
                    if(isset($company->id))
                    {
                        $company->featured = null;
                        $company->save();

                        $caption = "Company Package has Expired";
                        $contents = "The Featured Company Package for ".$company->name.", which highlights the company and vacancies, <b>has expired</b>.
                        <br>

                        <a href='".url('/checkout?product='.$p->product->slug)."'>Reactivate Package</a>
                         

                        <br><br>

                        <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                        Thank you for choosing Emploi.

                        <br>";
                        EmailJob::dispatch($p->order->invoice->first_name.' '.$p->order->invoice->last_name, $p->order->invoice->email, 'Featured Company Package Expired', $caption, $contents);
                    }

                }
            }

        }
    }

    public static function deactivateExpired()
    {
    	$ps = ProductOrder::where('contents','!=',null)->where('contents','not like','completed')->get();
    	for($i=0; $i<count($ps); $i++)
    		ProductOrder::toggle($ps[$i],'deactivate');
    }

    public static function enablePending()
    {
        $ps = ProductOrder::where('contents',NULL)->get();
        for($i=0; $i<count($ps); $i++)
        {
            $p_o = $ps[$i];
            if($p_o->order->invoice->paid)
            {
                ProductOrder::toggle($p_o);
            }
        }
    }
}
