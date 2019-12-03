<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomVacancyEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $name, $subject,$contents,$caption,$email;
    public $banner, $template, $attachment1, $attachment2, $attachment3;
    public $sender_address;
    
    public function __construct($name, $subject, $caption, $contents, $email, $banner, $template, $attachment1, $attachment2, $attachment3, $sender_address = false)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->contents = $contents;
        $this->caption = $caption;
        $this->email = $email;
        $this->banner = $banner;
        $this->template = $template;
        $this->attachment1 = $attachment1;
        $this->attachment2 = $attachment2;
        $this->attachment3 = $attachment3;
        $this->sender_address = $sender_address;
        
    }

    public function build()
    {
        $view = $this->view("emails.".$this->template)
                ->subject($this->subject)
                ->with('banner',$this->banner)
                ->with('subject',$this->subject)
                ->with('contents',$this->contents)
                ->with('caption',$this->caption)
                ->with('email',$this->email)
                ->with('name',$this->name);

        //dd($this->attachment3);

        if($this->attachment1 == false)
        {
            //print 'attachment1 is empty';
        }
        else
        {
            $view->attach($this->attachment1);
        }

        if($this->attachment2 == false)
        {
            //print 'attachment2 is empty';
        }
        else
        {
            $view->attach($this->attachment2);
        }

        if($this->attachment3 == false)
        {
            //print 'attachment3 is empty';
        }
        else
        {
            $view->attach($this->attachment3);
        }

        if($this->sender_address !== false)
        {
            $view->from($this->sender_address);
        }

        return $view;
    }
}
