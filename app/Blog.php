<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'user_id', 'blog_category_id', 'title','slug','contents', 'image1','image2','status'
    ];

    public function category(){
    	return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }

    public function getPreviewAttribute(){
        $max_length = strlen($this->contents);
        if($max_length > 250)
            return substr($this->contents, 0,160).'...';
        return $this->contents;
    } 

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public static function active($counter = 10){
    	return Blog::where('status','active')->limit($counter)->get();
    }

    public function getImageUrlAttribute(){
        if(!isset($this->image1))
            return '/images/a1.jpg';
        else
            return '/storage/blogs/'.$this->image1;
    }

    public function getOtherImageUrlAttribute(){
        if(!isset($this->image2))
            return null;
        else
            return '/storage/blogs/'.$this->image2;
    }

    public static function recent($counter = 10){
        return Blog::where('status','active')
                    ->limit($counter)
                    ->orderBy('id','desc')
                    ->get();
    }
}
