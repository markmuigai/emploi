<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

use App\Seeker;
use App\User;

use App\Jobs\EmailJob;

class VerificationEmailsResend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'VerificationEmailsResend';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends verification emails to job seekers whos verification emails experienced error registering';

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
        $seekers = Seeker::where('featured','-1')
                ->where('resume',null)
                ->get();

        for($i=0; $i<count($seekers); $i++)
        {
            $user = $seekers[$i]->user;



            if(!isset($user->id))
                continue;

            $password = User::generateRandomString(10);
            $user->password = Hash::make($password);
            $user->save();

            $caption = "Thank you for registering your profile on Emploi as a Job Seeker.";
            $contents = "Here are your login credentials for Emploi: <br>
            username: <b>".$user->username."</b> <br>
            password: <b>$password</b>

            <br><br>

            <a href='".url('/login')."'>Log in here</a>

            <br><br>
            Log in to finish setting up your account for employers to easily find and shortlist you.
            ";
            EmailJob::dispatch($user->name, $user->email, 'Emploi Login Credentials', $caption, $contents);

            $this->info($i.'  '.$user->name.' was sent a verification link!');
        }
    }
}
