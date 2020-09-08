<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    protected $fillable = ['user_id','task_slug','reason','start_time', 'end_time'];


    //
}
