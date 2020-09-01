<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Post;

class RevertFeaturedJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:RevertFeaturedJobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make featured jobs created  more than 2 days ago to be be not featured';

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
        $posts = Post::where('featured','true')
                ->where('created_at', '<=', Carbon::now()->subDays(2)->toDateTimeString())
                ->where('slug', '!=', 'job-opportunity-at-pioneer-assurance')
                ->where('slug', '!=', 'sales-executive-intern-at-emploi')
                ->where('slug', '!=', 'insurance-direct-sales-representative-job-available-apply')  
                ->where('slug', '!=', 'insurance-sales-agents-pybi')                             
                ->where('slug', '!=', 'sales-representative-needed-apply ')
                ->where('slug', '!=', 'marketing-jobs-available-apply-now')
                ->where('slug', '!=', 'sales-officer-wanted-urgently-apply')
                ->where('slug', '!=', 'exciting-career-opportunity-in-insurance-sales')
                ->where('slug', '!=', 'head-of-business-development-at-emploi')
                ->where('slug', '!=', 'veterinarian-jobs-available-apply-now') 
                ->get();

        
        for($i=0; $i<count($posts); $i++)
        {
            $post = $posts[$i];

            $post->featured = 'false';
            $post->save();
        }
    }
}
