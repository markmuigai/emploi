<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use App\Company;
use App\Order;
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

    public static function featuredEmployer(Order $order)
    {
        $product = Product::where('slug','featured_company')->first();
        if(!isset($product->id))
            return false;

        ProductOrder::create([
            'order_id' => $order->id, 
            'product_id' => $product->id,
            'days_duration' => $product->days_duration,
            'price' => 0
        ]);
    }

    public static function toggle(ProductOrder $productOrder, $action = 'activate')
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
                    $invoice->thankYou('email');

                    
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
                    EmailJob::dispatch($p->order->invoice->first_name.' '.$p->order->invoice->last_name, $p->order->invoice->email,  'Featured Job Seeker Package Activated', $caption, $contents);
                    
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

                    <a href='".url('/checkout?product='.$p->product->slug)."'>Reactivate ". $p->product->title ." Package</a>
                     

                    <br><br>

                    <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                    Thank you for choosing Emploi.
                    

                    <br>";
                    EmailJob::dispatch($p->order->invoice->first_name.' '.$p->order->invoice->last_name, $p->order->invoice->email,  $p->product->title.' Package Expired', $caption, $contents);
        		}
        		
        	}
    	}
    	if($slug == 'pro')
    	{
    		if($action == 'activate')
        	{
                $packageUser = User::findOrFail($p->order->user_id);
                if($packageUser->role == 'seeker' && !$packageUser->seeker->canGetNotifications())
                {
                    $p->contents = now()->add($p->days_duration,'day');
                    $p->save();
                    $invoice->thankYou('email');

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
                    EmailJob::dispatch( $p->order->invoice->first_name.' '.$p->order->invoice->last_name, $p->order->invoice->email, 'Job Seeker Basic Package Activated', $caption, $contents);
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
                    EmailJob::dispatch( $p->order->invoice->first_name.' '.$p->order->invoice->last_name,  $p->order->invoice->email, 'Job Seeker Basic Package Expired', $caption, $contents);

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
                    EmailJob::dispatch( $p->order->invoice->first_name.' '.$p->order->invoice->last_name, $p->order->invoice->email, 'Job Seeker Basic Package is Expiring', $caption, $contents);
                }
        	}

    	}

    	if($slug == 'solo')
    	{
    		if($action == 'activate')
        	{
        		$p->contents = 1;
        		$p->save();

                $caption = "You can advertise a job on Emploi";
                $contents = "The Solo Package, which enables an employer to post a single vacancy, has been activated.
                <br>
                You can now login to your account and post a vacancy, afterwhich our administrator will approve and you can start receiving applications.
                <br>

                <a href='".url('/vacancies/create')."'>Post a Job</a>
                 

                <br><br>

                The vacancy will be featured for 30 days from the date of approval. Using our <b>Role Suitability Index</b>, you can now predict which candidates will be a success at your organization.
                <br>

                <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                Thank you for choosing Emploi.

                <br>";
                EmailJob::dispatch($p->order->invoice->first_name.' '.$p->order->invoice->last_name, $p->order->invoice->email, 'Solo Package Activated', $caption, $contents);
        	}
        	else
        	{
        		if( (int) $p->contents == 0 )
        		{
        			$p->contents = 'completed';
        			$p->save();

                    $caption = "Solo Package on Emploi Expired";
                    $contents = "The Solo Package, which enables an employer to post one vacancy, has <b>has expired</b>.
                    You can renew this package by clicking the link below:
                    <br>

                    <a href='".url('/checkout?product=solo')."'>Renew Solo Package</a>
                     

                    <br><br>

                    <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                    Thank you for choosing Emploi.

                    <br>";
                    EmailJob::dispatch($p->order->invoice->first_name.' '.$p->order->invoice->last_name, $p->order->invoice->email, 'Solo Package Expired', $caption, $contents);
        		}
        	}

    	}

    	if($slug == 'stawi')
    	{
    		if($action == 'activate')
        	{
                if($p->order->user->role != 'employer')
        		    $p->contents = "1|50|".now()->add($p->days_duration,'day');
                else
                {
                    $employer = $p->order->user->employer;
                    $employer->credits += 5000;
                    if($employer->save())
                    {
                        $p->contents = "1|0|".now()->add($p->days_duration,'day');
                    }
                }
        		$p->save();

                ProductOrder::featuredEmployer($p->order);

                $caption = "You can advertise a job and browse job seekers on Emploi";
                $contents = "The Stawi Package, which enables an employer to post upto 1 vacancy and request 50 job seeker profiles, has been activated.
                <br>
                You can now login to your account and post a vacancy, afterwhich our administrator will approve and you can start receiving applications.
                <br>


                <a href='".url('/vacancies/create')."'>Post a Job</a>
                <a href='".url('/employers/browse')."'>Browse Job Seekers</a>
                 

                <br><br>

                Each vacancy will be featured for 30 days from the date of approval. Using our <b>Role Suitability Index</b>, you can now predict which candidates will be a success at your organization.
                <br>

                <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                Thank you for choosing Emploi.

                <br>";
                EmailJob::dispatch($p->order->invoice->first_name.' '.$p->order->invoice->last_name, $p->order->invoice->email, 'Stawi Package Activated', $caption, $contents);
        	}
        	else
        	{
                $cont_ = $p->contents;
                $cont_ = explode("|", $cont_);


                if ($cont_[2] != 'completed') {
                    $expiry = new Carbon($cont_[2]);
                    $p->contents = $cont_[0].'|'.$cont_[1].'|completed';
                    $p->save();

                    $caption = "Stawi Package on Emploi Expired";
                    $contents = "The Stawi Package, which enables an employer to post one vacancy and request 50 job seeker profiles, has <b>has expired</b>. 
                    You can renew this package by clicking the link below:
                    <br>

                    <a href='".url('/checkout?product=stawi')."'>Renew Stawi Package</a>
                     

                    <br><br>

                    <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                    Thank you for choosing Emploi.

                    <br>";
                    EmailJob::dispatch($p->order->invoice->first_name.' '.$p->order->invoice->last_name, $p->order->invoice->email, 'Stawi Package Expired', $caption, $contents);
                }

                




        		if( (int) $cont_[0] == 0 )
        		{
        			$p->contents = '0|'.$count_[1].'|completed';
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

                ProductOrder::featuredEmployer($p->order);

                $caption = "You can advertise a job on Emploi";
                $contents = "The Solo Plus Package, which enables an employer to post upto 4 vacancies, has been activated.
                <br>
                You can now login to your account and post a vacancy, afterwhich our administrator will approve and you can start receiving applications.
                <br>

                <a href='".url('/vacancies/create')."'>Post a Job</a>
                 

                <br><br>

                Each vacancy will be featured for 30 days from the date of approval. Using our <b>Role Suitability Index</b>, you can now predict which candidates will be a success at your organization.
                <br>

                <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                Thank you for choosing Emploi.

                <br>";
                EmailJob::dispatch($p->order->invoice->first_name.' '.$p->order->invoice->last_name, $p->order->invoice->email, 'Solo Plus Package Activated', $caption, $contents);
        	}
        	else
        	{
        		if( (int) $p->contents == 0 )
        		{
        			$p->contents = 'completed';
        			$p->save();

                    $caption = "Solo Plus Package on Emploi Expired";
                    $contents = "The Solo Plus Package, which enables an employer to post as many vacancies, has <b>has expired</b>.
                    You can renew this package by clicking the link below:
                    <br>

                    <a href='".url('/checkout?product=solo_plus')."'>Renew Solo Plus Package</a>
                     

                    <br><br>

                    <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                    Thank you for choosing Emploi.

                    <br>";
                    EmailJob::dispatch($p->order->invoice->first_name.' '.$p->order->invoice->last_name, $p->order->invoice->email, 'Solo Plus Package Expired', $caption, $contents);
        		}
        	}

    	}

    	if($slug == 'infinity')
    	{
    		if($action == 'activate')
        	{
        		$p->contents = now()->add($p->days_duration,'day');
            	$p->save();

                ProductOrder::featuredEmployer($p->order);

                $caption = "You can advertise multiple jobs on Emploi";
                $contents = "The Solo Plus Package, which enables an employer to post as many vacancies for ".$p->product->days_duration." days, has been activated.
                <br>
                You can now login to your account and post a vacancy, afterwhich our administrator will approve and you can start receiving applications. <b>This package expires on ".$p->contents."</b>
                <br>

                <a href='".url('/vacancies/create')."'>Post a Job</a>
                 

                <br><br>

                Each vacancy will be featured for 30 days from the date of approval. Using our <b>Role Suitability Index</b>, you can now predict which candidates will be a success at your organization.
                <br>

                <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                Thank you for choosing Emploi.

                <br>";
                EmailJob::dispatch($p->order->invoice->first_name.' '.$p->order->invoice->last_name, $p->order->invoice->email, 'Infinity Package Activated', $caption, $contents);
        	}
        	else
        	{
        		$expiry = new Carbon($productOrder->contents);
        		if($today->diff($expiry)->days <= 0)
        		{
        			$p->contents = 'completed';
        			$p->save();

                    $caption = "Renew Infinity Package Expired ";
                    $contents = "The Infinity Package, which enables an employer to post as many vacancies, has <b>has expired</b>.
                    You can renew this package by clicking the link below:
                    <br>

                    <a href='".url('/checkout?product=infinity')."'>Renew Infinity Package</a>
                     

                    <br><br>

                    <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                    Thank you for choosing Emploi.

                    <br>";
                    EmailJob::dispatch($p->order->invoice->first_name.' '.$p->order->invoice->last_name, $p->order->invoice->email, 'Infinity Package Expired', $caption, $contents);
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

                        $caption = "Featured Company Package Expired";
                        $contents = "The Featured Company Package for ".$company->name.", which highlights the company and vacancies, <b>has expired</b>.
                        You can renew this package by following the link below:
                        <br>

                        <a href='".url('/checkout?product=featured_company')."'>Reactivate Package</a>
                         

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
