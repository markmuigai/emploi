<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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

        $sql = "SELECT responsibilities FROM posts WHERE responsibilities LIKE \"%HOW TO APPLY%\"";
        $results = DB::select($sql);
        $post = explode('HOW TO APPLY', $results[rand(0,count($results)-1)]->responsibilities);
        //$post = explode($results[rand(0,count($results)-1)]->responsibilities, );
        dd($post[1]);
        dd(count($results));
    }
}
