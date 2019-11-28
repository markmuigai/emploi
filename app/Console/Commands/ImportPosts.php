<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

use Storage;

use App\OldPost;
use App\OldPostIndustry;

class ImportPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ImportPosts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'imports data from career resources database';

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
        if(Storage::disk('local')->exists('resources.txt'))
        {
            $this->info('Career Resources Posts have already been imported ' . "\n");
            
        }
        else
        {
            $this->info('Importing Career Resources Posts' . "\n");
            $ready = true;
            if(!Storage::disk('local')->exists('posts.csv'))
                $ready = false;
            if(!$ready)
            {
                $this->info('File storage\\app\\posts.csv is missing' . "\n");
            }
            else
            {
                $this->info('Starting Import of Career Resources Posts' . "\n");

                $storage_path = storage_path();
                $file = $storage_path.'/app/posts.csv';
                $count_posts = 0;
                $lastPost= false;
                $row = 1;
                if (($handle = fopen($file, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                        $row++;

                        if(count($data) != 10)
                        {
                            $count_posts++;
                            continue;
                        }

                        if($data[2] == '')
                        {
                            $count_posts++;
                            continue;
                        }

                        $old_post_id = explode("=", $data[6]);
                        $old_post_id = (int) $old_post_id[count($old_post_id)-1];

                        $oldPost = OldPost::where('imported_from_post_id',$old_post_id)->first();
                        if(isset($oldPost->id))
                        {
                            //add old post industry
                            $count_posts++;
                        }
                        else
                        {
                            //create old post
                            $title = preg_replace("/[^a-zA-Z ]/", "", $data[2]);
                            $op = OldPost::where('title',$data[2])
                                    ->first();
                            $add = rand(200,50000);
                            if(isset($op->id))
                                $title .= '-'.$add;
                            //dd($title);
                            $slug = strtolower($title);
                            $slug = explode(" ", $slug);
                            $slug = implode("-", $slug);

                            //check if an old posts exists with same slug
                            //check if post exists with slug

                            $op = OldPost::where('slug',$slug)
                                    ->first();
                            if(isset($op))
                                $slug .= '-'.$add;

                            $contents = $data[1];
                            //T.2
                            for($i=0; $i<20; $i++)
                            {
                                $contents = str_replace("T.$i","<p>",$contents);
                            }

                            for($i=0; $i<20; $i++)
                            {
                                $contents = str_replace("1.$i","<p>",$contents);
                            }

                            $instances = substr_count($contents,'src="http');
                            for($i=0; $i<$instances; $i++)
                            {
                                $firstmatch = strpos($contents,'src="http');
                                if($firstmatch == FALSE)
                                    break;
                                $endtag = strpos($contents," ",$firstmatch+5);
                                $length = $endtag - $firstmatch;
                                $src = substr($contents,$firstmatch+5,strlen($contents));
                                $src = explode(" ", $src);
                                $src = substr($src[0], 0,strlen($src[0])-1);
                                $src = str_replace('http:', 'https:', $src);
                                $handle = fopen($src, 'r');
                                if(!$handle){
                                    $contents = str_replace($src, '#', $contents);
                                }
                                else
                                {
                                    $type = pathinfo($src, PATHINFO_EXTENSION);
                                    $data = file_get_contents($src);
                                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                    //dd($base64);
                                    $contents = str_replace($src, $base64, $contents);
                                }
                            }

                            if (!preg_match('!!u', $contents) || !preg_match('!!u', $title) )
                            {
                               $count_posts++;
                               continue;
                            }

                            $category = 'vacancies';
                            if($data[8] == 3 || $data[8] == "3")
                                $category = 'blog';
                            

                            $success = false;
                            try {
                                OldPost::create([
                                    'title' => $title, 
                                    'slug' => $slug,
                                    'country_id' => 1,
                                    'contents' => $contents,
                                    'imported_from_post_id' => $old_post_id,
                                    'category' => $category,
                                    'status' => 'published'
                                ]);
                                $success = true;
                            } catch (Exception $e) {
                                $count_posts++;
                            }

                            if($success)
                                $this->info("updated contents base64");
                            else
                                $this->info("failed to save old post");

                            
                        }

                        // if($row > 200)
                        //     break;
                        
                        // 0 is created ts, 
                        // 1 is contents
                        // data2 should be title
                        // data 3 is blank
                        // data 4 is publish, 5 is updated ts, 6 is link not NULL, 7 is blank, 8 is int not null, 9 is category ignore
                        //$this->info('['.$data[8].'] ['.$data[6].']');
                        //die($data[6]);
                        
                    }
                }

                $this->info("Import of Career Resources Posts Completed, $count_posts" . ' failed');
            }
        }
    }
}
