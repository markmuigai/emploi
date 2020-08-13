<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Post;

class DeactivateExpiredJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:DeactivateExpiredJobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate jobs which have reached dateline';

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
         $posts = Post::where('status','active')
                ->where('deadline', '<=', Carbon::now())
                ->get();

        
        for($i=0; $i<count($posts); $i++)
        {
            $post = $posts[$i];

            $post->status = 'inactive';
            $post->save();
        }
    }
}
