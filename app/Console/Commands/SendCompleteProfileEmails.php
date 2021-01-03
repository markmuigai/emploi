<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Seeker;

class SendCompleteProfileEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendCompleteProfileEmails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends emails to job seekers who have not completed their profiles';

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
        $seeker = seeker::where('date_of_birth',null)
                    ->orWhere('education_level_id',null)
                    ->orWhere('resume',null)
                    ->get();
        $this->info('Sending reminder for all job seekers who have not completed profile to complete:  '.count($seeker));

        $success = 0;
        $failed = 0;

        for ($s=0; $s < count($seeker); $s++) { 
            if ($seeker[$s]->completeProfileReminder('email')) {
                $success++;
            }
            else {
                $failed++;
            }    
        }

        $this->info('Complete profile Reminders sent! Success:  '.$success.', Failed:  '.$failed);
    }
}
