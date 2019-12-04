<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

use Storage;

use App\Post;

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

                        $category = 'vacancies';
                        if($data[8] == 3 || $data[8] == "3")
                            $category = 'blog';

                        $title = preg_replace("/[^a-zA-Z ]/", "", $data[2]);

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

                        $slug = strtolower($title);
                        $slug = explode(" ", $slug);
                        $slug = implode("-", $slug);

                        $p = Post::where('slug',$slug)->first();
                        if(isset($p->id))
                            $slug = $slug.rand(200,4000);

                        $p = Post::where('slug',$slug)->first();
                        if(isset($p->id))
                            $slug = $slug.rand(200,4000);


                        $industryId = 1;
                        if($data[8] == 1 || $data[8] == "1")
                            $industryId = 32;
                        if($data[8] == 3 || $data[8] == "3")
                            $industryId = 32;
                        if($data[8] == 7 || $data[8] == "7")
                            $industryId = 3;
                        if($data[8] == 8 || $data[8] == "8")
                            $industryId = 4;
                        if($data[8] == 9 || $data[8] == "9")
                            $industryId = 5;
                        if($data[8] == 10 || $data[8] == "10")
                            $industryId = 8;
                        if($data[8] == 11 || $data[8] == "11")
                            $industryId = 9;
                        if($data[8] == 12 || $data[8] == "12")
                            $industryId = 34;
                        if($data[8] == 13 || $data[8] == "13")
                            $industryId = 10;
                        if($data[8] == 14 || $data[8] == "14")
                            $industryId = 27;
                        if($data[8] == 15 || $data[8] == "15")
                            $industryId = 6;
                        if($data[8] == 16 || $data[8] == "16")
                            $industryId = 2;
                        if($data[8] == 17 || $data[8] == "17")
                            $industryId = 11;
                        if($data[8] == 18 || $data[8] == "18")
                            $industryId = 19;
                        if($data[8] == 20 || $data[8] == "20")
                            $industryId = 12;
                        if($data[8] == 21 || $data[8] == "21")
                            $industryId = 25;
                        if($data[8] == 22 || $data[8] == "22")
                            $industryId = 33;
                        if($data[8] == 23 || $data[8] == "23")
                            $industryId = 13;
                        if($data[8] == 24 || $data[8] == "24")
                            $industryId = 14;
                        if($data[8] == 25 || $data[8] == "25")
                            $industryId = 16;
                        if($data[8] == 26 || $data[8] == "26")
                            $industryId = 17;
                        if($data[8] == 27 || $data[8] == "27")
                            $industryId = 21;
                        if($data[8] == 28 || $data[8] == "28")
                            $industryId = 1;
                        if($data[8] == 29 || $data[8] == "29")
                            $industryId = 30;
                        if($data[8] == 30 || $data[8] == "30")
                            $industryId = 7;
                        if($data[8] == 31 || $data[8] == "31")
                            $industryId = 25;
                        if($data[8] == 32 || $data[8] == "32")
                            $industryId = 22;
                        if($data[8] == 33 || $data[8] == "33")
                            $industryId = 29;
                        if($data[8] == 34 || $data[8] == "34")
                            $industryId = 18;
                        if($data[8] == 35 || $data[8] == "35")
                            $industryId = 20;
                        if($data[8] == 36 || $data[8] == "36")
                            $industryId = 15;
                        if($data[8] == 37 || $data[8] == "37")
                            $industryId = 32;
                        if($data[8] == 38 || $data[8] == "38")
                            $industryId = 32;
                        if($data[8] == 39 || $data[8] == "39")
                            $industryId = 32;
                        if($data[8] == 40 || $data[8] == "40")
                            $industryId = 39;
                        if($data[8] == 41 || $data[8] == "41")
                            $industryId = 35;
                        if($data[8] == 42 || $data[8] == "42")
                            $industryId = 36;
                        if($data[8] == 43 || $data[8] == "43")
                            $industryId = 38;
                        if($data[8] == 44 || $data[8] == "44")
                            $industryId = 37;
                        if($data[8] == 45 || $data[8] == "45")
                            $industryId = 32;
                        if($data[8] == 46 || $data[8] == "46")
                            $industryId = 26;

                        


                        Post::create([
                            'slug' => $slug, 
                            'company_id' => 1, 
                            'title' => $title, 
                            'industry_id' => $industryId,
                            'education_requirements' => 2, 
                            'experience_requirements' => 4,
                            'responsibilities' => $contents, 
                            'status' => 'active',
                            'positions' => rand(1,3),
                            'location_id' => 1,
                            'vacancy_type_id'=> 1,
                            'how_to_apply' => 'To apply for this position, send your updated C.V. to jobs@emploi.co quoting <b>'.$title.'</b> as the subject.'
                        ]);

                        $this->info(" Imported " . $slug);

                        
                    }
                }

                $this->info("Import of Career Resources Posts Completed, $count_posts" . ' failed');
            }
        }
    }
}
