<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartTimer extends Model
{
        protected $fillable = [
        'user_id','task_slug','status'
    ];


    public function task(){
        return $this->belongsTo(Task::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function shortlistToggle(){
        if($this->status == NULL)
        {
            $this->status = 'shortlisted';
            // if($this->user->seeker->featured > 0)
            // {
            //     $caption = "You have been shortlisted for the ".$this->task->title." Position";
            //     $contents = $this->task->company->name."'s HR has viewed your profile and is interested. The recuiter may call you or someone in their organization will reach out to you on this position. To increase your chances further, ensure your profile has been completed and your resume up to date with no errors. <br>

            //     <br>
            //     Emploi Team Wishes you the best.
            //     <br><br>
            //     ";

            //     EmailJob::dispatch($this->user->name, $this->user->email, "Shortlisted for ".$this->post->title, $caption, $contents);
            // }
            return $this->save();
        }
        if($this->status == 'shortlisted')
        {
            $this->status = NULL;
            return $this->save();
        }
        return false;
    }

}
