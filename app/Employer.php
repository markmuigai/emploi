<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Watson\Rememberable\Rememberable;
use Illuminate\Notifications\Notifiable;

use App\CvRequest;
use App\Invoice;
use App\JobApplication;
use App\Order;
use App\ProductOrder;
use App\SavedProfile;
use App\EmployerSubscription;

use Carbon\Carbon;
use App\Jobs\EmailJob;

class Employer extends Model
{
    use Notifiable, Rememberable; 
    public $rememberFor = 3;
    
    protected $fillable = [
        'user_id', 'name', 'industry_id','company_name', 'contact_phone','company_phone','company_email','country_id','address','credits','created_at'
    ];

    public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }

    public function sendWelcomeEmail(){
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
        EmailJob::dispatch($this->user->name, $this->user->email, 'Welcome to Emploi', $caption, $contents);
    }

    public function activateFreeStawi($days = 30){
        $product = Product::where('slug','stawi')->first();
        if(isset($product->id))
        {
            $order = Order::create([
                'user_id' => $this->user->id,
                'slug' => Order::generateUniqueSlug(10)
            ]);
            $productOrder = ProductOrder::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'days_duration' => $days,
                'price' => 0
            ]);
            $invoice = Invoice::create([
                'order_id' => $order->id,
                'slug' => Invoice::generateUniqueSlug(11),
                'first_name' => $this->company_name,
                'email' => $this->user->email,
                'description' => $product->description,
                'sub_total' => 0,
                'alternative_payment_slug' => 'Free Stawi Package'
            ]);
            if(app()->environment() === 'production')
            {
                $message = $this->name." activated free stawi package. Email: ".$this->user->email;
                $this->notify(new \App\Notifications\SystemError($message));
            }
            // ProductOrder::enablePending();

        }
        //create order
        //create product order
        //send slack notification

    }

    public function isOnStawiPackage(){
        if($this->user->email == 'jobs@emploi.co')
            return true;
        $orders = $this->user->orders;
        foreach ($orders as $order) {
            foreach ($order->productOrders as $po) {
                if($po->slug == 'stawi' && $po->contents != null)
                {
                    $cont = $po->contents;
                    $cont = explode("|", $cont_);

                    if($cont[2] != 'completed')
                        return true;
                }
            }
        }
        return false;
    }

    public function industry(){
    	return $this->belongsTo(Industry::class,'industry_id');
    }

    public function country(){
    	return $this->belongsTo(Country::class,'country_id');
    }

    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }

    public function getCompaniesAttribute(){
        return $this->user->companies;
    }

    public function cvRequests(){
        return $this->hasMany(CvRequest::class);
    }

    public function hasRequestedCV($seeker)
    {
        $r = CvRequest::where('employer_id',$this->id)->where('seeker_id',$seeker->id)->first();
        if(isset($r->id))
            return true;
        return false;
    }

    public function canViewSeeker($seeker)
    {
        $r = CvRequest::where('employer_id',$this->id)->where('seeker_id',$seeker->id)->where('status','accepted')->first();

        if(isset($r->id))
            return true;
        return false;
    }

    public function canRequestSeeker($seeker)
    {
        $r = CvRequest::where('employer_id',$this->id)
                ->where('seeker_id',$seeker->id)
                ->where('status','pending')
                ->orWhere('status','denied')
                ->first();

        if(isset($r->id))
            return false;
        return true;
    }

    public function isOnPaas(){

        if($this->user->email == 'jobs@emploi.co')
                return true;
        $ep = EmployerSubscription::where('user_id',$this->user->id)
                ->Where('status', 'active')
                ->first();

        if(isset($ep->id))
            return true;
        return false;
    }

    public function activateFreeEclub($days = 30){
        $product = Product::where('slug','e_club')->first();
        if(isset($product->id))
        {
            $order = Order::create([
                'user_id' => $this->user->id,
                'slug' => Order::generateUniqueSlug(10)
            ]);
            $productOrder = ProductOrder::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'days_duration' => $days,
                'price' => 0
            ]);
            $invoice = Invoice::create([
                'order_id' => $order->id,
                'slug' => Invoice::generateUniqueSlug(11),
                'first_name' => $this->company_name,
                'email' => $this->user->email,
                'description' => $product->description,
                'sub_total' => 0,
                'alternative_payment_slug' => 'Free E-Club Package'
            ]);
        $user = EmployerSubscription::where('email', $this->user->email)->where('status','inactive')->first();

        if(isset($user))
            {
               $user->status = 'active';
               $user->ending = now()->addMonths(1);
               $user->save();

                  $caption = "  Employer E-Club subscriptions activated on Emploi";
                  $contents = "You have successfully subscribed to the E-Club which offers a great variety of benefits to employers which include. <br>
                    <ul>
                        <li>Sourcing, management and growth tools at one stop.</li>
                        <li>Get access to our Job Seeker database and get to hire top professionals.</li>
                        <li>Thorough professional vetting: Know The Professional Candidate Referencing.</li>
                        <li>Top quality performance: KPI & performance appraisal framework.</li>
                        <li>We will help you maintain a healthy pipeline of potential replacements at all times.</li>
                        <li>Speed: 48 hour turnaround time.</li>
                    </ul>

                  <p>If you require further information on your subscription, <a href='".url('/contact')."'>Contact Us</a>.</p>

                  Thank you for choosing Emploi. 

                  <br>";
                  EmailJob::dispatch( $this->company_name,  $this->user->email, 'E-Club Subscription activated', $caption, $contents);
            } 

        }
        //create order
        //create product order
        //send slack notification

    }

    public function remainingCompanyBoosts(){
        $orders = $this->user->orders;
        $productOrders = [];

        for($i=0; $i<count($orders); $i++)
        {
            $order = $orders[$i];
            for ($k=0; $k < count($order->productOrders); $k++) { 
                $po = $order->productOrders[$k];
                if($po->product->slug == 'featured_company' && $po->contents == null)
                    $productOrders[] = $po;
            }
            //$productOrders[] = $order->productOrders;
            
        }
        return $productOrders;
    }



    public function savedProfiles(){
        return $this->hasMany(SavedProfile::class);
    }

    public function hasSavedProfile($seeker){
        $s = SavedProfile::where('employer_id',$this->id)
                ->where('seeker_id',$seeker->id)
                ->first();
        if(isset($s->id))
            return true;
        return false;
    }

    public function getSavedProfile($seeker){
        $sp = SavedProfile::where('employer_id',$this->id)->where('seeker_id',$seeker->id)->first();
        if(isset($sp->id))
            return $sp;
        return false;
    }

    public function saveProfile($seeker){
        SavedProfile::create([
            'employer_id' => $this->id,
            'seeker_id' => $seeker->id
        ]);
        return true;
    }

    public function removeSavedProfile($seeker){
        $sp = SavedProfile::where('employer_id',$this->id)
                ->where('seeker_id',$seeker->id)
                ->first();
        if(isset($sp->id))
            return $sp->delete();
        return true;
    }

    public function getPostsAttribute(){

        $companies = $this->user->companies;
        $company_ids = array();
        for($i=0; $i<count($companies); $i++)
        {
            array_push($company_ids, $companies[$i]->id);
        }
        $posts = Post::whereIn('company_id',$company_ids)->orderBy('id','DESC')->get();

        return $posts;


        // $companies = $this->user->companies;
        // $posts = array();
        // for($i=0; $i<count($companies); $i++)
        // {
        //     for($k=count($companies[$i]->posts)-1; $k>0; $k--)
        //     {
        //         array_push($posts, $companies[$i]->posts[$k]);
        //     }
        // }
        // return $posts;
    }

    public function getWeekApplicationsCounterAttribute(){
        $weekMap = [
            0 => 'Sun',
            1 => 'Mon',
            2 => 'Tue',
            3 => 'Wed',
            4 => 'Thu',
            5 => 'Fri',
            6 => 'Sat',
        ];
        $stats = array();
        for($i=6; $i>=0; $i--)
        {
            $day = Carbon::now()->subDays($i);
            $counter = count($this->getApplicationsOn($day));


            array_push($stats, array($counter,$weekMap[$day->dayOfWeek]));
        }
        return $stats;
    }

    public function getActivePostsAttribute(){

        $companies = $this->user->companies;
        $company_ids = array();
        for($i=0; $i<count($companies); $i++)
        {
            array_push($company_ids, $companies[$i]->id);
        }
        $posts = Post::whereIn('company_id',$company_ids)->where('status','active')->orderBy('id','DESC')->get();

        return $posts;

        // $companies = $this->user->companies;
        // $posts = array();
        // for($i=0; $i<count($companies); $i++)
        // {
        //     for($k=count($companies[$i]->posts)-1; $k>0; $k--)
        //     {
        //         if($companies[$i]->posts[$k]->status == 'active')
        //             array_push($posts, $companies[$i]->posts[$k]);
        //     }
        // }
        // return $posts;
    }

    public function getShortlistingPostsAttribute(){

        $companies = $this->user->companies;
        $company_ids = array();
        for($i=0; $i<count($companies); $i++)
        {
            array_push($company_ids, $companies[$i]->id);
        }
        $posts = Post::whereIn('company_id',$company_ids)->where('status','active')->where('how_to_apply',null)->orderBy('id','DESC')->get();

        return $posts;

        // $companies = $this->user->companies;
        // $posts = array();
        // for($i=0; $i<count($companies); $i++)
        // {
        //     for($k=count($companies[$i]->posts)-1; $k>0; $k--)
        //     {
        //         if($companies[$i]->posts[$k]->status == 'active')
        //             array_push($posts, $companies[$i]->posts[$k]);
        //     }
        // }
        // return $posts;
    }

    public function getClosedPostsAttribute(){
        $companies = $this->user->companies;
        $company_ids = array();
        for($i=0; $i<count($companies); $i++)
        {
            array_push($company_ids, $companies[$i]->id);
        }
        $posts = Post::whereIn('company_id',$company_ids)->where('status','!=','active')->orderBy('id','DESC')->get();

        return $posts;

        // $companies = $this->user->companies;
        // $posts = array();
        // for($i=0; $i<count($companies); $i++)
        // {
        //     for($k=count($companies[$i]->posts)-1; $k>0; $k--)
        //     {
        //         if($companies[$i]->posts[$k]->status != 'active')
        //             array_push($posts, $companies[$i]->posts[$k]);
        //     }
        // }
        // return $posts;
    }

    public function recentApplications($counter = 5){
        $posts = array();
        $c = "SELECT id FROM companies WHERE user_id = ".$this->user->id;
        $c = DB::select($c);
        $companies = '(';
        for($i=0; $i<count($c); $i++)
        {
            $companies .= $c[$i]->id;
            if($i < count($c)-1)
                $companies .= ',';
        }
        $companies .= ')';

        if($companies == '()')
            return array();

        $p = "SELECT id FROM posts WHERE company_id IN $companies";
        $p = DB::select($p);

        // $posts = [];
        // for($i=0; $i<count($p); $i++)
        //     $posts[] = $p[$i]->id;

        // $applications = JobApplication::whereIn('post_id',$posts)->get();

        $posts = '(';
        for($i=0; $i<count($p); $i++)
        {
            $posts .= $p[$i]->id;
            if($i < count($p)-1)
                $posts .= ',';
        }
        $posts .= ')';

        if($posts == '()')
            return array();

       $sql = "SELECT users.username, users.name, posts.slug, posts.title, job_applications.id, job_applications.user_id, job_applications.post_id, job_applications.created_at FROM job_applications LEFT JOIN users ON users.id = job_applications.user_id LEFT JOIN posts ON posts.id = job_applications.post_id WHERE job_applications.post_id IN  $posts ORDER BY job_applications.created_at DESC LIMIT $counter ";

        $applications = DB::select($sql);

        return $applications;

        dd($a);

        for($i=0; $i<count($this->companies); $i++)
        {
            for($k=0; $k<count($this->companies[$i]->posts); $k++)
            {
                array_push($posts, $this->companies[$i]->posts[$k]);
            }
        }

        $new_posts = '(';
        for($i=0; $i<count($posts); $i++)
        {
            $new_posts .= $posts[$i]->id;
            if($i < count($posts)-1)
                $new_posts .= ',';
        }
        $new_posts .= ')';

        if($new_posts == '()')
            return array();

        $sql = "SELECT id FROM job_applications WHERE post_id IN  $new_posts ORDER BY created_at DESC LIMIT $counter";
        $results = DB::select($sql);

        $applications = array();

        for($i=0; $i<count($results); $i++)
            array_push($applications,JobApplication::find($results[$i]->id));

        return $applications;
    }

    public function getApplicationsOn($day){
        $posts = array();
        for($i=0; $i<count($this->companies); $i++)
        {
            for($k=0; $k<count($this->companies[$i]->posts); $k++)
            {
                array_push($posts, $this->companies[$i]->posts[$k]);
            }
        }

        $new_posts = '(';
        for($i=0; $i<count($posts); $i++)
        {
            $new_posts .= $posts[$i]->id;
            if($i < count($posts)-1)
                $new_posts .= ',';
        }
        $new_posts .= ')';

        if($new_posts == '()')
            return array();

        // $real_day = $day->isoFormat('M/D/YYYY');

        // dd($real_day);

        $sql = "SELECT id FROM job_applications WHERE post_id IN  $new_posts";
        $results = DB::select($sql);

        $applications = array();

        for($i=0; $i<count($results); $i++)
        {
            $application = JobApplication::find($results[$i]->id);
            $create_day = new Carbon($application->created_at);
            $create_day = $create_day->format('Y-m-d');
            $day = new Carbon($day);
            $day = $day->format('Y-m-d');
            if($day == $create_day)
                array_push($applications,$application);
        }



        //dd($applications);

        return $applications;



    }

    public function jobApplications(){
        $posts = $this->posts->pluck('id');
        return JobApplication::whereIn('post_id',$posts)->get();
        dd($companies);
    }

    public function canPostJob($counter = 1){
        if($this->user->email == 'jobs@emploi.co')
            return true;
        $orders = $this->user->orders;
        $productOrders = [];
        for($i=0; $i<count($orders); $i++)
        {
            $order = $orders[$i];
            if(!$order->invoice->paid)
                continue;
            $orderProducts = $order->productOrders;
            for($k=0; $k<count($orderProducts); $k++)
            {
                if($orderProducts[$k]->contents && $orderProducts[$k]->contents != 'completed')
                    array_push($productOrders, $orderProducts[$k]);
            }
        }
        if(count($productOrders) == 0)
            return false;
        $max = 0;
        for($i=0; $i<count($productOrders); $i++)
        {
            $po = $productOrders[$i];
            if($po->product->slug == 'infinity')
                return true;

            if($po->product->slug == 'stawi' || $po->product->slug == 'solo')
            {
                if((int) $po->contents != 0)
                    $max++;
            }

            if($po->product->slug == 'solo_plus')
            {
                if((int) $po->contents != 0)
                {
                    $max += (int) $po->contents;
                }
            }
        }
        if($max >= $counter)
            return true;
        return false;
    }

    public function hasPostedAJob($post)
    {
        if($this->user->email == 'jobs@emploi.co')
            return true;

        $orders = $this->user->orders;
        $productOrders = [];
        for($i=0; $i<count($orders); $i++)
        {
            $order = $orders[$i];
            if(!$order->invoice->paid)
                continue;
            $orderProducts = $order->productOrders;
            for($k=0; $k<count($orderProducts); $k++)
            {
                if($orderProducts[$k]->contents  && $orderProducts[$k]->contents != 'completed')
                    array_push($productOrders, $orderProducts[$k]);
            }
        }

        if(count($productOrders) == 0)
            return false;


        for($i=0; $i<count($productOrders); $i++)
        {
            $po = $productOrders[$i];
            if($po->product->slug == 'infinity')
            {
                $caption = "We have approved ".$post->title." job post on Emploi, under Emploi Infinity Package";
                $contents = "Our Administrator has approved <b>".$post->title."</b> under the Emploi Infinity Package. This package enables you to post as many jobs until ".$po->contents."
                <br>
                <a class='btn btn-sm btn-success' href='".url('/vacancies/'.$post->slug)."'>View Job Post</a>
                <a class='btn btn-sm btn-primary' href='".url('/employers/applications/'.$post->slug)."'>View Applications</a>
                <br>
                Job Seekers will start sending applications any moment from now. 
                Contact us directly by calling us: <a href='tel:+254702068282'>+254 702 068 282</a> or by sending us an e-mail to <a href='mailto:info@emploi.co'>info@emploi.co</a> for further enquiries<br>
                Thank you for choosing Emploi.";
                EmailJob::dispatch($po->order->user->name, $po->order->user->email, 'Emploi Infinity Package - Job Post Approved', $caption, $contents);
                return true;
            }

            if($po->product->slug == 'solo')
            {
                if((int) $po->contents != 0)
                {
                    $po->contents = 0;
                    $saved = $po->save();
                    if($saved)
                    {
                        //$package = $po->product->slug == 'solo' ? 'Solo Package' : 'Stawi Package';

                        $caption = "We have approved ".$post->title." job post on Emploi, under Emploi Solo Package";
                        $contents = "Our Administrator has approved <b>".$post->title."</b> under the Emploi Solo Package. 
                        <br>
                        <a class='btn btn-sm btn-success' href='".url('/vacancies/'.$post->slug)."'>View Job Post</a>
                        <a class='btn btn-sm btn-primary' href='".url('/employers/applications/'.$post->slug)."'>View Applications</a>
                        <br>
                        Job Seekers will start sending applications any moment from now. 
                        Contact us directly by calling us: <a href='tel:+254702068282'>+254 702 068 282</a> or by sending us an e-mail to <a href='mailto:info@emploi.co'>info@emploi.co</a> for further enquiries<br>
                        Thank you for choosing Emploi.";
                        EmailJob::dispatch($po->order->user->name, $po->order->user->email, "Emploi Solo Package - Job Post Approved", $caption, $contents);
                        return true;
                    }

                }
            }

            if($po->product->slug == 'stawi')
            {
                $cont_ = $po->contents;
                $cont_ = explode("|", $cont_);

                if( (int) $cont_[0] == 0)
                {
                    return false;
                }
                else
                {
                    $po->contents = '0|'.$cont_[1];
                    $saved = $po->save();

                    if($saved)
                    {

                        $caption = "We have approved ".$post->title." job post on Emploi, under Emploi Stawi Package";
                        $contents = "Our Administrator has approved <b>".$post->title."</b> under the Emploi Stawi Package. 
                        <br>
                        <a class='btn btn-sm btn-success' href='".url('/vacancies/'.$post->slug)."'>View Job Post</a>
                        <a class='btn btn-sm btn-primary' href='".url('/employers/applications/'.$post->slug)."'>View Applications</a>
                        <br>
                        Job Seekers will start sending applications any moment from now. <br>
                        You can shortlist other job seekers, ".$cont_[1]." profiles remain. <br>
                        This package also enables you to view referee reports which are accessible on the employers dashboard.

                        <br>
                        Contact us directly by calling us: <a href='tel:+254702068282'>+254 702 068 282</a> or by sending us an e-mail to <a href='mailto:info@emploi.co'>info@emploi.co</a> for further enquiries<br>
                        Thank you for choosing Emploi.";
                        EmailJob::dispatch($po->order->user->name, $po->order->user->email, "Emploi Solo Package - Job Post Approved", $caption, $contents);
                        return true;
                    }
                }
            }

            if($po->product->slug == 'solo_plus')
            {
                if((int) $po->contents != 0)
                {
                    $remaining = (int) $po->contents;
                    $remaining -= 1;

                    $po->contents = $remaining;
                    $saved = $po->save();
                    if($saved)
                    {
                        $caption = "We have approved ".$post->title." job post on Emploi, under Emploi Solo Plus";
                        $contents = "Our Administrator has approved <b>".$post->title."</b> under the Emploi Solo Plus. This package allows you to post 4 jobs, $remaining remain.
                        <br>
                        <a class='btn btn-sm btn-success' href='".url('/vacancies/'.$post->slug)."'>View Job Post</a>
                        <a class='btn btn-sm btn-primary' href='".url('/employers/applications/'.$post->slug)."'>View Applications</a>
                        <br>
                        Job Seekers will start sending applications any moment from now. 
                        Contact us directly by calling us: <a href='tel:+254702068282'>+254 702 068 282</a> or by sending us an e-mail to <a href='mailto:info@emploi.co'>info@emploi.co</a> for further enquiries<br>
                        Thank you for choosing Emploi.";
                        EmailJob::dispatch($po->order->user->name, $po->order->user->email, 'Emploi Solo Plus Package - Job Post Approved', $caption, $contents);

                        return true;
                    }
                }
            }

        }
        return false;
    }
}
