<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $email, $subject, $caption, $contents, $template;

    public function __construct($name, $email, $subject, $caption, $contents, $template = 'custom')
    {
        $this->name = $name; 
        $this->email = $email; 
        $this->subject = $subject;
        $this->caption = $caption; 
        $this->contents = $contents; 
        $this->template = $template;
    }

    public function build()
    {
        return $this->view("emails.".$this->template)
                ->text("emails.".$this->template."_txt")
                ->subject($this->subject)
                ->with('subject',$this->subject)
                ->with('contents',$this->contents)
                ->with('caption',$this->caption)
                ->with('email',$this->email)
                ->with('name',$this->name);
    }
}
