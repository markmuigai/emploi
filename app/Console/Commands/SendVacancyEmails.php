<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Seeker;
class SendVacancyEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendVacancyEmails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send latest vacancy email to all subscribed job seekers';

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

        $vacancies = Seeker::where('gender','M')->get();
        $this->info('Sending vacancy email to all subcribed job seekers:  '.count($vacancies));

        $success = 0;
        $failed = 0;

        for ($k=0; $k < count($vacancies); $k++) { 
            if ($vacancies[$k]->SendVacancyEmail('email')) {
                $success++;
            }
            else {
                $failed++;
            }    
        }

        $this->info('Vacancy Emails sent! Success:  '.$success.', Failed:  '.$failed);
    }
}
