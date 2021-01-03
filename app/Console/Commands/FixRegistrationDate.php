<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

use App\User;

class FixRegistrationDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:FixRegistrationDate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fixes the registration date of users who were imported on the platform';

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
        $this->info('Starting to Fix Registration dates');
        if(Storage::disk('local')->exists('fixregdate.csv'))
        {
            $this->info('Fixing ... ');

            $storage_path = storage_path();
            $file = $storage_path.'/app/fixregdate.csv';
            $row = 1;
            $missing = 0;
            $fixed = 0;
            $w = 100;
            if (($handle = fopen($file, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                    $row++;
                    $email = $data[2];
                    $creat = $data[5];
                    $user = User::where('email',$email)->first();
                    if(isset($user->id))
                    {
                        $user->created_at = $creat;
                        $user->save();
                        if($user->role == 'seeker')
                        {
                            $seeker = $user->seeker;
                            $seeker->created_at = $creat;
                            $seeker->save();
                            
                        }
                        elseif($user->role == 'employer')
                        {
                            $emp = $user->employer;                            
                            $emp->created_at = $creat;
                            $emp->save();
                            
                        }
                        $fixed ++;
                        $w--;
                        if($w <= 0)
                        {
                            $w = 100;
                            $this->info($row.' ... ');
                        }
                    }
                    else
                    {
                        $missing ++;
                    }
                }
            }

            $this->info('Fixed '.$fixed.' Missing '.$missing);
        }
        else
        {
            $this->info('Fix Failed. FIle storage/app/fixregdate.csv is missing');
        }
    }
}
