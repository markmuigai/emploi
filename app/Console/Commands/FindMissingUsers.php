<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

use App\User;

class FindMissingUsers extends Command
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
    protected $description = 'Finds users who were left out when moving from cv-portal';

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
        $this->info('Looking for missing users from last import');
        if(Storage::disk('local')->exists('fixregdate.csv'))
        {
            $this->info('Searching ... ');

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
                    $user = User::where('email',$email)->first();
                    if(!isset($user->id))
                    {
                        $this->info($row.' Missing '.$email.' '.$data[1]);
                        $missing++;
                    }
                }
            }

            $this->info('Missing '.$missing);
        }
        else
        {
            $this->info('Search Failed. FIle storage/app/fixregdate.csv is missing');
        }
    }
}
