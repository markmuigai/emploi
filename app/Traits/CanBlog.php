<?php
namespace App\Traits;
use Carbon\Carbon;

use App\Blog;
use App\Like;
use App\Blogger;

trait CanBlog {

    

    public function canWriteBlogs(){
    	if(isset($this->blogger) && $this->blogger->status == 'active' || $this->role == 'admin')
    		return true;
        return false;
    }

    public function canUseBloggingPanel(){
    	if(isset($this->blogger) && $this->blogger->status == 'active')
    		return true;
    	return false;
    }

    public function blogger(){
    	return $this->hasOne(Blogger::class);
    }

    
    
}