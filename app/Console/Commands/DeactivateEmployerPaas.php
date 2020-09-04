<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\EmployerSubscription;

class DeactivateEmployerPaas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:DeactivateEmployerPaas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Changes the status of employers whose subscription for PAAS has expired';

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
        $ends = EmployerSubscription::where('ending','<', now())->where('status','active')->get();

        for($i=0; $i<count($ends); $i++)
        {
            $end = $ends[$i];

            $end->status = 'completed'; //subscription expired
            $end->save();
        }    
    }
}
