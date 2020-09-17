<?php

namespace App\Console\Commands;
use Carbon\Carbon;

use Illuminate\Console\Command;
use App\EmployerSubscription;

use App\Jobs\EmailJob;

class DeactivateEmployerPaas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:DeactivateEmployerPaas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Changes the status of employers whose subscription for PAAS has expired';

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
        $ends = EmployerSubscription::where('ending','<', now())->where('status','active')->get();

        for($i=0; $i<count($ends); $i++)
        {
            $end = $ends[$i];

            $end->status = 'completed'; //subscription expired
            $end->save();
        $caption = "Your E-Club Membership Expired";
        $contents = "Your E-Club membership has expired <br>
                      You will nolonger be eligible for the following benefits: <br>
                      <ul>
                        <li>Sourcing, management and growth tools at one stop.</li>
                        <li>Get access to our Job Seeker database and get to hire top professionals.</li>
                        <li>Thorough professional vetting: Know The Professional Candidate Referencing.</li>
                        <li>Top quality performance: KPI & performance appraisal framework.</li>
                        <li>We will help you maintain a healthy pipeline of potential replacements at all times.</li>
                        <li>Speed: 48 hour turnaround time.</li>
                      </ul>

                      <br>

                    <a href=".url('/employers/e-club').">Reactivate E-Club</a>
                     
                    <br><br>

                    <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                    Thank you for choosing Emploi.
                    

                    <br>";
                    EmailJob::dispatch( $end->name, $end->email, 'E-Club Membership Expired', $caption, $contents);
        }

        $ends = EmployerSubscription::where('ending','>', now())->where('status','active')->get();

        for($i=0; $i<count($ends); $i++)
        {
            $end = $ends[$i];
            $expiry = new Carbon($end->ending);
            $today = now();

            if($today->diff($expiry)->days == 10){

            $caption = "Renew E-Club Membership";
            $contents = "Your E-Club memebership which offers a great variety of benefits to employers will expire in ".$today->diff($expiry)->days." days <br>
                      You will nolonger be eligible for the following benefits: <br>
                      <ul>
                        <li>Sourcing, management and growth tools at one stop.</li>
                        <li>Get access to our Job Seeker database and get to hire top professionals.</li>
                        <li>Thorough professional vetting: Know The Professional Candidate Referencing.</li>
                        <li>Top quality performance: KPI & performance appraisal framework.</li>
                        <li>We will help you maintain a healthy pipeline of potential replacements at all times.</li>
                        <li>Speed: 48 hour turnaround time.</li>
                      </ul>

                      <br>

                    <a href=".url('/employers/e-club').">Renew Golden Club</a>
                     
                    <br><br>

                    <p>If you require further information regarding this package, kindly <a href='".url('/contact')."'>Contact Us</a>.</p>

                    Thank you for choosing Emploi.
                    

                    <br>";
                    EmailJob::dispatch( $end->name, $end->email, 'E-Club Membership', $caption, $contents);
            }
        }     
    }
}
