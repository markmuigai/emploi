<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Seeker;
use App\User;

class FixSeekersPublicName extends Command
{
    protected $signature = 'command:FixSeekersPublicName';

    protected $description = 'Updates all job seekers public name using User::makePublicName($name)';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if ($this->confirm('FixSeekersPublicName will update all job seekers public_name! Do you wish to continue?' . "\n")) {
            $seekers = Seeker::all();
            $success = 0;
            $failures = 0;

            $this->info('FixSeekersPublicName is Starting ... ');

            for ($k=0; $k < count($seekers); $k++) { 
                $seeker = $seekers[$k];
                $seeker->public_name = User::makePublicName($seeker->user->name);
                if($seeker->save())
                {
                    $success++;
                    $this->info($seeker->user->name.' => '. $seeker->public_name . "\n");
                }
                else
                {
                    $failures++;
                    $this->info('--FAILED: seeker_id:'. $seeker->id.', '.$seeker->user->name.', public_name: '.$seeker->public_name);
                }
                
            }
            $this->info("FixSeekersPublicName Completed! \n TOTAL: ".count($seekers)." \n Success: ".$success." \n Failures: ".$failures);
        }
        else {
            $this->info('FixSeekersPublicName was cancelled ');
        }
    }
}
