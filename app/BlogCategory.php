<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Watson\Rememberable\Rememberable;

class BlogCategory extends Model
{
	use Rememberable;
    public $rememberFor = 120;
    
    protected $fillable = [
        'name', 'slug', 'description','status'
    ];

    public function blogs(){
    	return $this->hasMany(Blog::class);
    }
}
