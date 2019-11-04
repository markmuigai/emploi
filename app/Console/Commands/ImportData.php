<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

use App\Company;
use App\CvRequest;
use App\Employer;
use App\SavedProfile;
use App\Seeker;
use App\User;
use App\UserPermission;

class ImportData extends Command
{

    protected $signature = 'command:ImportData';

    protected $description = 'imports data from storage\app\employers.csv and seekers.csv';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if(Storage::disk('local')->exists('portal.txt'))
        {
            $this->info('CV Portal data has been already imported ' . "\n");
            
        }
        else
        {
            $ready = true;
            $this->info('Starting Import of CV-Portal data');
            if(!Storage::disk('local')->exists('employers.csv'))
                $ready = false;
            if(!Storage::disk('local')->exists('seekers.csv'))
                $ready = false;
            if(!Storage::disk('local')->exists('saved-profiles.csv'))
                $ready = false;
            if(!Storage::disk('local')->exists('resume-requests.csv'))
                $ready = false;
            if($ready)
            {
                $this->info('CV Portal data ready for import ');
                $this->info('1/7 Importing Job Seekers ');
                $storage_path = storage_path();
                $file = $storage_path.'/app/seekers.csv';
                $count_seekers = 0;
                $count_seekers_skipped=0;
                $lastUser = false;
                $row = 1;
                if (($handle = fopen($file, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                        $row++;
                        
                        // if($row<19517)
                        //     continue;
                        //print_r($data);
                        if(count($data) == 1)
                        {
                            $lastUser->password = $lastUser->password.$data[0];
                            $lastUser->save();
                            continue;
                        }
                        if(count($data) != 16)
                        {
                            $count_seekers_skipped++;
                            
                            continue;
                        }
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
                        

                        $resume_url = explode(" ", $resume_url);
                        $resume_url = implode("%20", $resume_url);

                        if(!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@.+\./', $email))
                            continue;
                        $user = User::where('email',$email)->first();
                        if(isset($user->id))
                            continue;

                        $user = User::create([
                            'name' => $name, 
                            'username' => $email, 
                            'email' => $email, 
                            'password' => $password,
                            'email_verification' => User::generateRandomString(15),
                            'email_verified_at' => now()
                        ]);

                        if(!isset($user->id))
                            continue;

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

                        $seeker = Seeker::create([
                            'user_id' => $user->id,
                            'public_name' => $public_name, 
                            'gender' => $gender == 'NULL' ? 'M' : $gender, 
                            'date_of_birth' => $dob, 
                            'phone_number' => $phone,
                            'current_position' => $position,
                            'post_address' => $address,
                            'years_experience' => $years_experience,
                            'industry_id' => $industry,
                            'objective' => $objective,
                            'country_id' => 1,
                            'location_id' => 1,
                            'resume' => $resume_url,
                            'featured' => $featured,
                            'education' => $education,
                            'experience' => $experience
                        ]);

                        UserPermission::create([ 'user_id' => $user->id, 'permission_id' => 4 ]);

                        $resume = 'https://cv-portal.jobsikaz.com/assets/resumes/'.$resume_url;
                        $to_path = storage_path().'/app/public/resumes/'.$resume_url;
                        copy($resume, $to_path );
                        $this->info(' '.$count_seekers.' '.$name.' Imported');
                        
                        $count_seekers++;
                        // if($count_seekers>1 && config('env') != 'production')
                        //     break;
                    }
                    fclose($handle);
                }
                $this->info(' '.$count_seekers_skipped.'  skipped');
                $this->info('2/7 Job Seekers Import completed succesfully ['.$count_seekers.']');
                $this->info('3/7 Importing Employers ');

                
                $file = $storage_path.'/app/employers.csv';
                $count_employers = 0;
                $row = 1;
                if (($handle = fopen($file, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $row++;
                        // if($row<2500)
                        //     continue;
                        $company = $data[0];
                        $industry = $data[1];
                        $mobile = $data[2];
                        $phone = $data[3];
                        $location = $data[4];
                        $address = $data[5];
                        $email = $data[6];
                        $password = $data[7];
                        $name = $data[8];

                        if(!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@.+\./', $email))
                            continue;
                        $user = User::where('email',$email)->first();
                        if(isset($user->id))
                            continue;

                        $user = User::create([
                            'name' => $name, 
                            'username' => $email, 
                            'email' => $email, 
                            'password' => $password,
                            'email_verification' => User::generateRandomString(15),
                            'email_verified_at' => now()
                        ]);

                        if(!isset($user->id))
                            continue;

                        $c = Company::where('name',$company)->first();
                        if(isset($c->id))
                            $company = $company.User::generateRandomString(2);

                        $employer = Employer::create([
                            'user_id' => $user->id, 
                            'name' => $name, 
                            'industry_id' => $industry == '' ? 1 : $industry,
                            'company_name' => $company, 
                            'contact_phone' => $mobile,
                            'company_phone' => $phone,
                            'company_email' => $email,
                            'country_id' => 1,
                            'address' => $address
                        ]);

                        UserPermission::create([ 'user_id' => $user->id, 'permission_id' => 3 ]);

                        $company = Company::create([
                            'name' => $company, 
                            'user_id' => $user->id, 
                            'industry_id' => $industry == '' ? 1 : $industry,
                            'company_size_id' => 3,
                            'location_id' => 1
                        ]);

                        $this->info(' '.$count_employers.' '.$company->name.' Imported');
                        $count_employers++;
                        // if($count_employers>9 && config('env') != 'production')
                        //     break;
                    }
                }

                $this->info('4/7 Importing Employers Saved Profiles ');

                $file = $storage_path.'/app/saved-profiles.csv';
                $count_profiles = 0;
                $row=1;
                if (($handle = fopen($file, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $row++;

                        // if($row<2500)
                        //     continue;

                        $employer = User::where('email',$data[0])->first();
                        if(!isset($employer->id))
                        {
                            $this->info(' '.$data[0].' matches no employer');
                            continue;
                        }

                        

                        $seeker = User::where('email',$data[1])->first();
                        if(!isset($seeker->id))
                            continue;

                        SavedProfile::create([
                            'employer_id' => $employer->employer->id, 
                            'seeker_id' => $seeker->seeker->id
                        ]);

                        $this->info(' '.$employer->name.' saved '.$seeker->name);

                    }
                }


                $this->info('5/7 Importing Employers Resume Requests ');

                $file = $storage_path.'/app/resume-requests.csv';
                $count_profiles = 0;
                $row=1;
                if (($handle = fopen($file, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $row++;



                        $employer = User::where('email',$data[0])->first();
                        if(!isset($employer->id))
                        {
                            $this->info(' '.$data[0].' matches no employer');
                            continue;
                        }

                        

                        $seeker = User::where('email',$data[1])->first();
                        if(!isset($seeker->id))
                            continue;

                        if(!isset($employer->employer->id) || !isset($seeker->seeker->id))
                        {
                            $this->info(' '.$data[0].' '.$data[1].' didnt match');
                            continue;
                        }


                        CvRequest::create([
                            'employer_id' => $employer->employer->id, 
                            'seeker_id' => $seeker->seeker->id,
                            'status' => $data[2]
                        ]);

                        $this->info(' '.$employer->name.' requested '.$seeker->name.' as '.$data[2]);

                    }
                }

                $this->info('6/7 Employers Import completed succesfully ');
                $this->info('7/7 Changing Import status to imported ');

                //import seekers   
                    //import data from csv
                    //import cv from cv-portal.jobsikaz.com and save in storage
                //import employers
                //create storage\app\portal.txt with timestamp as contents
                $this->info('Import Complete ');
            }
            else
            {
                $this->info('CV-Portal Import error -> In storage\app\ directory, either employers.csv, seekers.csv, saved-profiles.csv, or resume-requests.csv is missing' . "\n");
            }
            
        }
    }
}
