<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostGroupJob extends Model
{
    protected $fillable = [
        'post_id', 'post_group_id'
    ];

    public function post(){
    	return $this->belongsTo(Post::class);
    }

    public function postGroup(){
    	return $this->belongsTo(PostGroup::class);
    }

    
}
