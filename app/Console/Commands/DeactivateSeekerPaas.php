<?php

namespace App\Console\Commands;

use Carbon\Carbon;

use Illuminate\Console\Command;
use App\SeekerSubscription;

use App\Jobs\EmailJob;


class DeactivateSeekerPaas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:DeactivateSeekerPaas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'changes the status of jobseeker whose subscription for PAAS has expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
     {
        $ends = SeekerSubscription::where('ending','<', now())->where('status','active')->get();

        for($i=0; $i<count($ends); $i++)
        {
            $end = $ends[$i];

            $end->status = 'completed';
            $end->save();

            $caption = "Your Golden Club Membership Expired";
            $contents = "Your Golden Club membership has expired <br>
                      You will nolonger be eligible for the following benefits: <br>
                      <ul>
                          <li>Guaranteed placement on an on-demand basis to more than one company.</li>
                          <li>Access to profession-based training and development opportunities.</li>
                          <li>Increased chances for eventual permanent employment.</li>
                          <li>Guaranteed income after successful placement.</li>
                          <li>Great networking opportunities with top employers.</li>
                      </ul>

                      <br>

                    <a href=".url('/job-seekers/register-paas').">Reactivate Golden Club</a>
                     
                    <br><br>

                    <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                    Thank you for choosing Emploi.
                    

                    <br>";
                    EmailJob::dispatch( $end->name, $end->email, 'Golden Club Membership Expired', $caption, $contents);
        }

        $ends = SeekerSubscription::where('ending','>', now())->where('status','active')->get();

        for($i=0; $i<count($ends); $i++)
        {
            $end = $ends[$i];
            $expiry = new Carbon($end->ending);
            $today = now();

            if($today->diff($expiry)->days == 7){

            $caption = "Renew Golden Club Membership";
            $contents = "Your Golden Club memebership which enables you to be placed for part time jobs from top employers, will expire in ".$today->diff($expiry)->days." days <br>
                      You will nolonger be eligible for the following benefits: <br>
                      <ul>
                          <li>Guaranteed placement on an on-demand basis to more than one company.</li>
                          <li>Access to profession-based training and development opportunities.</li>
                          <li>Increased chances for eventual permanent employment.</li>
                          <li>Guaranteed income after successful placement.</li>
                          <li>Great networking opportunities with top employers.</li>
                      </ul>

                      <br>

                    <a href=".url('/job-seekers/register-paas').">Renew Golden Club</a>
                     
                    <br><br>

                    <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                    Thank you for choosing Emploi.
                    

                    <br>";
                    EmailJob::dispatch( $end->name, $end->email, 'Renew Golden Club Membership', $caption, $contents);
            }
        }     
    }
}
