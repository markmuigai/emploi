<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostGroup extends Model
{
    protected $fillable = [
        'slug', 'title', 'description','image', 'how_to_apply','status'
    ];

    public function postGroupJobs(){
    	return $this->hasMany(PostGroupJob::class);
    }

    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getShareFacebookLinkAttribute(){
        return 'https://www.facebook.com/sharer.php?u='.url('/vacancies/'.$this->slug);
    }

    public function getShareTwitterLinkAttribute(){
        return 'https://twitter.com/share?url='.url('/vacancies/'.$this->slug).'&text='.$this->title.'&hashtags=Emploi';
    }

    public function getShareLinkedinLinkAttribute(){
        return 'http://www.linkedin.com/shareArticle?mini=true&url='.url('/vacancies/'.$this->slug);
    }

    public function getTitle($len = false){
        if($len)
            return substr(ucwords(strtolower($this->title)), 0, 30);
        return ucwords(strtolower($this->title));
        
    }
}
