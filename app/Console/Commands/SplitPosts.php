<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use App\Blog;

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

        $sql = "SELECT id, responsibilities FROM posts WHERE responsibilities LIKE '%<strong>how to apply</strong>%'";
        $results = DB::select($sql);
        // for($i=0; $i<count($results); $i++)
        // {
        //     $post = Post::findOrFail($results[$i]->id);
        //     $responsibilities =
        // }
        // dd(count($results));

        // dd($results[rand(0,count($results)-1)]->responsibilities);

        dd(htmlspecialchars($results[rand(0,count($results)-1)]->responsibilities));

        $post = explode('<strong>how to apply</strong>', $results[rand(0,count($results)-1)]->responsibilities);
        //$post = explode($results[rand(0,count($results)-1)]->responsibilities, );
        dd($post);
        print count($post);
        print $post[0];
        dd($post[1]);
        dd($post[1]);
        dd(count($results));
    }
}
