<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Storage;

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
    protected $description = 'imports data from career resources';

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
                        //dd(count($data));
                        // if($ro)
                        // if($row>50)
                        //     break;
                        // 0 is created ts, 
                        // 1 is contents
                        // data2 should be title
                        // data 3 is blank
                        // data 4 is publish, 5 is updated ts, 6 is link not NULL, 7 is blank, 8 is int not null, 9 is category
                        //$this->info('['.$data[8].'] ['.$data[6].']');
                        print  $data[4];
                    }
                }
            }
        }
    }
}
