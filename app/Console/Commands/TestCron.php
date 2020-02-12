<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Notifications\InvoicePaid;
use App\User;

class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TestCron';
    protected $name = 'TestCron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tests whether crontab is working correctly';

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
        $user = User::first();
        $user->notify(new InvoicePaid('Testing '));
    }
}
