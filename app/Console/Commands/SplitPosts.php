<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use App\Post;

class SplitPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SplitPosts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Splits  posts table that have how to apply mentioned in responsibilities';

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
        $this->info("Starting to Split Imported Posts that have how to apply");

        $sql = "SELECT id,responsibilities FROM posts WHERE responsibilities LIKE '%<strong>how to apply</strong>%'";
        $results = DB::select($sql);
        $changed =0;
        for($i=0; $i<count($results); $i++)
        {
            $post = Post::findOrFail($results[$i]->id);

            $tit = strtolower($post->title);
            if(strpos($tit, 'how to apply'))
                continue;

            $hay = strtolower($post->responsibilities);

            $respo = $post->responsibilities;
            $apply = '';

            $startPos = strpos($hay, '<strong>how to apply</strong>');
            $apply = substr($respo, $startPos);
            $respo = substr($respo, 0,$startPos);

            $post->how_to_apply = substr($respo, $startPos);
            $post->responsibilities = substr($respo, 0,$startPos);;

            $post->save();

            $changed++;

            $this->info($post->title . " changed");
        }

        $this->info($changed . " posts changed");
        
    }
}
