<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OldPost extends Model
{
    protected $fillable = [
        'title', 'slug','country_id','contents','imported_from_post_id','status','created_at','updated_at','category'
    ];

    public function country(){
    	return $this->belongsTo(Country::class);
    }

    public function industries(){
    	return $this->hasMany(OldPostIndustry::class);
    }

    public function getShareTextAttribute(){
        $tit = explode(" ", $this->title);
        return implode("+", $tit).' '.$this->country->name;
    }

    public function getShareFacebookLinkAttribute(){
        return 'https://www.facebook.com/sharer.php?u='.url('/'.$this->category.'/'.$this->slug);
    }

    public function getShareTwitterLinkAttribute(){
    	$b = $this->category == 'blog' ? 'Blog' : '';
        return 'https://twitter.com/share?url='.url('/'.$this->category.'/'.$this->slug).'&text='.$this->shareText.'&hashtags=Emploi'.$this->country->code.$b;
    }

    public function getShareLinkedinLinkAttribute(){
        return 'http://www.linkedin.com/shareArticle?mini=true&url='.url('/'.$this->category.'/'.$this->slug);
    }   
    
}
