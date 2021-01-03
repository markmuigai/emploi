<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Seeker;
class SendFeaturedSeeekerAnalytics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendFeaturedSeeekerAnalytics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send analytics to the featured jobseeker to their email addresses';

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

        $fseekers = Seeker::where('featured','>',0)->get();
        $this->info('Sending email to all featured jobseekers:  '.count($fseekers));

        $success = 0;
        $failed = 0;

        for ($f=0; $f < count($fseekers); $f++) { 
            if ($fseekers[$f]->sendProfileAnalytics('email')) {
                $success++;
            }
            else {
                $failed++;
            }    
        }

        $this->info('Analytics sent! Success:  '.$success.', Failed:  '.$failed);
    }
}
