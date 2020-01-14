<?php
namespace App\Traits;
use Carbon\Carbon;

use App\Blog;
use App\Like;

trait CanLike {

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function like($target_class,$target_id)
    {
        $like = Like::where('target_class',$target_class)
                ->where('target_id',$target_id)
                ->where('user_id',$this->id)
                ->first();
        if(isset($like->id))
        {
            if($like->status != 'active')
            {
                $like->status = 'active';
                return $like->save();
            }
            return true;           
        }

        $like = Like::create([
            'target_class' => $target_class, 
            'target_id' => $target_id,
            'user_id' => $this->id
        ]);

        if(isset($like->id))
            return true;
        return false;

        
    }

    public function toggleLike($target_class,$target_id){
        if($this->hasLiked($target_class,$target_id))
            return $this->unlike($target_class,$target_id);
        else
            return $this->like($target_class,$target_id);
    }

    public function unlike($target_class,$target_id)
    {
        $like = Like::where('target_class',$target_class)
                ->where('target_id',$target_id)
                ->where('user_id',$this->id)
                ->first();
        if(isset($like->id))
        {
            $like->status = 'inactive';
            return $like->save();
        }
        return true;
    }

    public function hasLiked($target_class,$target_id){
        $like = Like::where('target_class',$target_class)
                ->where('target_id',$target_id)
                ->where('user_id',$this->id)
                ->where('status','active')
                ->first();
        return isset($like->id) ? true : false;
    }

    public function hasUnliked($target_class,$target_id){
        return !$this->hasLiked($target_class,$target_id);
    }
    
}