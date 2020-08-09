<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\SeekerSubscription;


class DeactivateSeekerPaas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:DeactivateSeekerPaas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'changes the status of jobseeker whose subscription for PAAS has expired';

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
        $ends = SeekerSubscription::where('ending','<', now())->where('status','active')->get();

        for($i=0; $i<count($ends); $i++)
        {
            $end = $ends[$i];

            $end->status = 'completed';
            $end->save();
        }    
    }
}
