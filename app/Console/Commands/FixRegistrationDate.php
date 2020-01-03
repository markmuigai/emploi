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
        }
        else
        {
            $this->info('Fix Failed. FIle storage/app/fixregdate.csv is missing');
        }
    }
}
