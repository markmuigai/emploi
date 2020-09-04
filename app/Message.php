<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'title', 'task_slug', 'body','to_id','from_id','attachment','seen'
    ];
}
