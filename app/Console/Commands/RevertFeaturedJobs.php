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
                ->where('slug', '!=', 'sales-executives-wanted')
                ->where('slug', '!=', 'sales-advisors-wanted-urgently-apply-now')
                ->where('slug', '!=', 'financial-advisors-needed')
                ->where('slug', '!=', 'sales-advisors-wanted-urgently-apply-now')
                ->where('slug', '!=', 'graphic-designer-needed ')
                ->where('slug', '!=', 'marketing-officers-2-positions-wanted-in-nairobi-apply-here')
                ->where('slug', '!=', 'ongoing-recruitment-check-it-out-and-apply-now')        
                ->get();

        
        for($i=0; $i<count($posts); $i++)
        {
            $post = $posts[$i];

            $post->featured = 'false';
            $post->save();
        }
    }
}
