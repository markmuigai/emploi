<?php
namespace App\Traits;
use Carbon\Carbon;

use App\Blog;
use App\Like;

trait CanEditCV {

    

    public function canHandleCvEdits(){
        if(isset($this->cvEditor->id) && $this->cvEditor->status == 'active')
            return true;
        return false;
    }

    
    
}