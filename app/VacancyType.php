<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Watson\Rememberable\Rememberable;

class VacancyType extends Model
{
    use Rememberable;
    public $rememberFor = 180;
    protected $fillable = [
        'slug','name', 'description'
    ];

    public function posts(){
    	return $this->hasMany(Post::class);
    }

    public function getBadgeAttribute(){
    	if($this->slug == 'full-time')
    		return 'badge-success';
    	if($this->slug == 'part-time')
    		return 'badge-orange';
    	if($this->slug == 'internships')
    		return 'badge-danger';
    	if($this->slug == 'contract')
    		return 'badge-info';
    	return 'badge-default';
    }
}
