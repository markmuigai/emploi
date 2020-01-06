<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

use App\Parser;
use App\Seeker;
use App\User;
use App\UserPermission;

class FixMissingSeekers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:FixMissingSeekers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates users who were left out by first import';

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
        $this->info('Starting to Fix Missing Job Seekers');
        if(Storage::disk('local')->exists('missing-seekers.csv'))
        {
            $this->info('Fixing ... ');

            $storage_path = storage_path();
            $file = $storage_path.'/app/missing-seekers.csv';
            $count_seekers = 0;
            $count_seekers_skipped=0;
            $lastUser = false;
            $row = 1;
            if (($handle = fopen($file, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                    $row++;

                    // if(count($data) == 1)
                    // {
                    //     $lastUser->password = $lastUser->password.$data[0];
                    //     $lastUser->save();
                    //     continue;
                    // }
                    // if(count($data) != 16)
                    // {
                    //     $count_seekers_skipped++;
                        
                    //     continue;
                    // }
                    $name = $data[0];
                    $public_name = $data[1];
                    $dob = $data[2];
                    $email = $data[3];
                    $gender = $data[4];
                    $phone = $data[5];
                    $position = $data[6];
                    $address = $data[7];
                    $years_experience = abs($data[8]);
                    $experience = htmlspecialchars($data[9]);
                    $education = htmlspecialchars($data[10]);
                    $objective = htmlspecialchars($data[11]);
                    $resume_url = $data[12];
                    $featured = $data[13];
                    $industry = abs($data[14]) == 0 ? 1 : abs($data[14]);
                    $password = $data[15];
                    
                    // dd($resume_url);
                    
                    //$resume_url = 

                    // $resume_url = explode(" ", $resume_url);
                    // $resume_url = implode("%20", $resume_url);

                    // if(!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@.+\./', $email))
                    // {
                    //     $count_seekers_skipped++;
                    //     continue;
                    // }
                    $user = User::where('email',$email)->first();
                    if(isset($user->id))
                    {
                        $count_seekers_skipped++;
                        continue;
                    }

                    $username = explode(" ", $name);
                    $username = strtolower(implode("",$username)).rand(1,9999);

                    try {
                        $user = User::create([
                            'name' => $name, 
                            'username' => $username, 
                            'email' => $email, 
                            'password' => $password,
                            'email_verification' => User::generateRandomString(15),
                            'email_verified_at' => now()
                        ]);
                    } catch (\Illuminate\Database\QueryException $exception) {
                        $count_seekers_skipped++;
                        continue;
                    }

                    

                    if(!isset($user->id))
                    {
                        $count_seekers_skipped++;
                        continue;
                    }

                    $lastUser = $user;

                    if($dob == '0000-00-00')
                        $dob = '2000-1-1';

                    $dob = explode('/', $dob);
                    if(count($dob)>1)
                    {
                        $dob = $dob[2].'-'.$dob[0].'-'.$dob[1];
                    }
                    else
                        $dob = implode("-", $dob);

                    try {
                        $seeker = Seeker::create([
                            'user_id' => $user->id,
                            'public_name' => $public_name, 
                            'gender' => $gender == 'NULL' ? 'M' : $gender, 
                            'date_of_birth' => $dob, 
                            'phone_number' => $phone,
                            'current_position' => $position,
                            'post_address' => $address,
                            'years_experience' => $years_experience > 50 ? 50 : $years_experience,
                            'industry_id' => $industry,
                            'objective' => $objective,
                            'country_id' => 1,
                            'location_id' => 1,
                            'resume' => $resume_url,
                            'featured' => $featured,
                            'education' => $education,
                            'experience' => $experience
                        ]);
                    } catch (\Illuminate\Database\QueryException $exception) {
                        $user->delete();
                        $count_seekers_skipped++;
                        continue;
                    }

                    

                    UserPermission::create([ 'user_id' => $user->id, 'permission_id' => 4 ]);

                    if($resume_url != '')
                    {
                        $resume = 'https://cv-portal.jobsikaz.com/assets/resumes/'.str_replace(' ', '%20', $resume_url);

                        //$resume = urlencode($resume);
                        $to_path = storage_path().'/app/public/resumes/'.$resume_url;   

                        
                        
                        $copyResult = copy($resume, $to_path );
                        if($copyResult)
                        {
                            $parser = new Parser($resume_url);
                            $seeker->resume_contents = $parser->convertToText();
                            $seeker->save();
                        }
                        
                        
                        
                    }

                    
                    
                    $this->info(' '.$count_seekers.' '.$name.' Imported');
                    $count_seekers++;
                    //sleep(rand(1,3));
                    // if($count_seekers>1 && config('env') != 'production')
                    //     break;
                }
                fclose($handle);
            }

            $this->info(' '.$count_seekers_skipped.'  skipped');

        }
        else
        {
            $this->info('Fix Failed. FIle storage/app/missing-seekers.csv is missing');
        }
    }
}
