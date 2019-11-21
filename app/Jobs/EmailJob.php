<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\CustomEmail;
use Mail;

use App\User;

class EmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $name, $email, $subject, $caption, $contents, $template;

    public function __construct($name, $email, $subject, $caption, $contents, $template = 'custom')
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->caption = $caption;
        $this->contents = $contents;
        $this->template = $template;
    }

    public function handle()
    {
        if(User::subscriptionStatus($this->email))
        {
            $handle = Mail::to($this->email)
                ->send(new CustomEmail($this->name,$this->email,$this->subject,$this->caption,$this->contents, $this->template));
        }

        //print_r($handle);
    }
}
