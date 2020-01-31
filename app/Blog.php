<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Watson\Rememberable\Rememberable;

class Blog extends Model
{
    use Rememberable;
    public $rememberFor = 30;

    protected $fillable = [
        'user_id', 'blog_category_id', 'title','slug','contents', 'image1','image2','status'
    ];

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function category(){
    	return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }

    public function getTitle($length = 50){
        if($length > strlen($this->title))
        {
            return substr($this->title, 0,$length);
        }
        return $this->title;
    }

    public function getPreviewAttribute(){
        $max_length = strlen($this->contents);
        if($max_length > 250)
            return strip_tags(substr($this->contents, 0,160).'...');
        return strip_tags(strip_tags($this->contents));
        return $this->contents;
    } 

    public function longPreview($max = 160){
        $max_length = strlen($this->contents);
        if($max > $max_length)
            $max = $max_length;

        return strip_tags(substr($this->contents, 0,$max).'...');

        if($max_length > 250)
            return strip_tags(substr($this->contents, 0,$max).'...');
        return strip_tags($this->contents);
        return strip_tags($this->contents);
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

    public function getPostedOnAttribute(){
        $date = Carbon::parse($this->created_at);
        $now = Carbon::now();
        return $date->format('jS F Y');
        return $date->diffInDays($now);
    }

    public function getShareTextAttribute(){
        $tit = explode(" ", $this->title);
        return implode("+", $tit).' on '.$this->category->title.'\'s Career Centre';
    }

    public function getShareFacebookLinkAttribute(){
        return 'https://www.facebook.com/sharer.php?u='.url('/blog/'.$this->slug);
    }

    public function getShareTwitterLinkAttribute(){
        return 'https://twitter.com/share?url='.url('/blog/'.$this->slug).'&text='.$this->shareText.'&hashtags=EmploiCareerCentre';
    }

    public function getShareLinkedinLinkAttribute(){
        return 'http://www.linkedin.com/shareArticle?mini=true&url='.url('/blog/'.$this->slug);
    }

    public function getShareWhatsappLinkAttribute(){
       return "whatsapp://send?text=Read ".$this->title.' Blog on Emploi\'s Career Centre. '.url('/blog/'.$this->slug);
    }
}
