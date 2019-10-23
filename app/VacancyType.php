<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacancyType extends Model
{
    protected $fillable = [
        'slug','name', 'description'
    ];

    public function posts(){
    	return $this->hasMany(Post::class);
    }
}
