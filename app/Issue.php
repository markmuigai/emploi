<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'title', 'description','assignee','start_on','due_date','task_slug','ended_on','status','assigned_on','supervisor','owner','watcher'
    ];
}
