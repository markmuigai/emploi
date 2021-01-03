<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Seeker;

class CleanResumes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CleanResumes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes all resumes that are not mentioned on job seekers table.';

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
        //return $this->info();
        $wasted = 0;
        $useful = 0;

        foreach (glob(storage_path()."/app/public/resumes/*") as $filename) {
            $name = explode("/", $filename);
            $name = $name[count($name)-1];
            $seeker = Seeker::where('resume',$name)->first();
            if(!isset($seeker->id))
            {
                $wasted += filesize($filename) / 1024;
                if(file_exists($filename))
                {
                    unlink($filename);
                    $this->info('File '.$name.' was purged!');
                }
            }
            else
                $useful += filesize($filename) / 1024;
            //$this->info($name);
            //$this->info("$filename size " . filesize($filename));
        }
        $this->info("Wasted Storage on CVs: ".round($wasted)." KB | ".round($wasted/1024).' MB was cleaned');
        $this->info("Used Storage on CVs: ".round($useful)." KB | ".round($useful/1024).' MB');
    }
}
