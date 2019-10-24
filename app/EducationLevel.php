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

    public function getSuperiorAttribute(){
    	if($this->superior_id == false)
    		return false;
    	return EducationLevel::find($this->superior_id);
    }

    public function getInferiorAttribute(){
    	if($this->inferior_id == false)
    		return false;
    	return EducationLevel::find($this->inferior_id);
    }

    public function isSuperiorTo($educationLevel){
    	$focus = $this;
    	while($focus->superior != false)
    	{
    		if($focus->superior_id == $educationLevel->id)
    			return true;
    		$focus = EducationLevel::find($focus->superior_id);
    	}
    	return false;
    }

    public function isInferiorTo($educationLevel){
    	$focus = $this;
    	while($focus->inferior != false)
    	{
    		if($focus->inferior_id == $educationLevel->id)
    			return true;
    		$focus = EducationLevel::find($focus->inferior_id);
    	}
    	return false;
    }
}
