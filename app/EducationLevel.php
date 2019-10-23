<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    protected $fillable = [
        'name', 'superior_id','inferior_id'
    ];

    public function posts(){
    	return $this->hasMany(Post::class);
    }
}
