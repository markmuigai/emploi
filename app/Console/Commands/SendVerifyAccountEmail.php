<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Seeker;
class SendVerifyAccountEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendVerifyAccountEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email verification to jobseekers who have not verified accounts';

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

        $seekers = Seeker::where('id', '>', 30000)->get();
        $this->info('Sending verify account email to jobseekers:  '.count($seekers));

        $success = 0;
        $failed = 0;

        for ($k=0; $k < count($seekers); $k++) { 
            if ($seekers[$k]->verifyAccountEmail('email')) {
                $success++;
            }
            else {
                $failed++;
            }    
        }

        $this->info('Verification emails sent! Success:  '.$success.', Failed:  '.$failed);
    }
}
