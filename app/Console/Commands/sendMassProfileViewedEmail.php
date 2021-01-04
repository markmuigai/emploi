<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Seeker;
class SendMassProfileViewedEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendMassProfileViewedEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mass profile viewed emails to all jobseekers';

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

        $seekers = Seeker::where('featured',1)->get();
        $this->info('Sending profile viewed email to all featured job seekers:  '.count($seekers));

        $success = 0;
        $failed = 0;

        for ($k=0; $k < count($seekers); $k++) { 
            if ($seekers[$k]->SendMassProfileViewedEmail('email')) {
                $success++;
            }
            else {
                $failed++;
            }    
        }

        $this->info('Profile viewed emails sent! Success:  '.$success.', Failed:  '.$failed);
    }
}
