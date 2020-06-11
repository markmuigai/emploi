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
    protected $description = 'Make featured jobs that have been there for more than 3 days to be be not featured';

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
                ->where('created_at', '<=', Carbon::now()->subDays(3)->toDateTimeString())
                ->where('slug', '!=', 'full-stack-developer')
                ->where('slug', '!=', 'full-stack-developer-intern')
                ->where('slug', '!=', 'seo-specialist')
                ->where('slug', '!=', 'front-end-developer-miiz')
                ->where('slug', '!=', 'kyeopkenya-youth-employment--opportunities-project-is-looking-for-you-apply-now')
                ->get();

        
        for($i=0; $i<count($posts); $i++)
        {
            $post = $posts[$i];

            $post->featured = 'false';
            $post->save();
        }
    }
}
