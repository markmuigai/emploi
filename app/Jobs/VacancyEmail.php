<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\CustomVacancyEmail;

class VacancyEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $recepient, $name, $subject, $caption, $contents;
    public $banner, $template, $attachment1, $attachment2, $attachment3;
    public $sender_address;

    public function __construct($recepient, $name, $subject, $caption, $contents,$banner,$template,$attachment1,$attachment2,$attachment3,$sender_address=false)
    {
        $this->recepient = $recepient;
        $this->name = $name;
        $this->subject = $subject;
        $this->caption = $caption;
        $this->contents = $contents;
        $this->banner = $banner;
        $this->template = $template;
        $this->attachment1 = $attachment1;
        $this->attachment2 = $attachment2;
        $this->attachment3 = $attachment3;
        $this->sender_address = $sender_address;
    }

    public function handle()
    {
        Mail::to($this->recepient)
            ->send(
                new CustomVacancyEmail(
                    $this->name,
                    $this->subject,
                    $this->caption,
                    $this->contents,
                    $this->recepient,
                    $this->banner,
                    $this->template,
                    $this->attachment1,
                    $this->attachment2,
                    $this->attachment3,
                    $this->sender_address
                )
            );
    }
}
