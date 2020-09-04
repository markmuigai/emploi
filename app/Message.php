<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'task_title', 'body','to_id','from_id','attachment','seen'
    ];
}
