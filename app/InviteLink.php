<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class InviteLink extends Model
{
    protected $fillable = [
        'user_id','message','slug','clicks_count','created_at'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function getSinceAttribute(){
    	return $this->created_at->diffForHumans();
    	$date = Carbon::parse($this->created_at);
        $now = Carbon::now();

        return $date->diffInDays($now);
    }

    public function getShareTextAttribute(){
    	return $this->message ? $this->message : $this->user->inviteText;
    }

    public function getShareFacebookLinkAttribute(){
        return 'https://www.facebook.com/sharer.php?u='.url('/invites/'.$this->slug);
    }

    public function getShareTwitterLinkAttribute(){
        return 'https://twitter.com/share?url='.url('/invites/'.$this->slug).'&text='.$this->shareText.'&hashtags=EmploiInvite';
    }

    public function getShareLinkedinLinkAttribute(){
        return 'http://www.linkedin.com/shareArticle?mini=true&url='.url('/invites/'.$this->slug);
    }

    public function getShareWhatsappLinkAttribute(){
       return "whatsapp://send?text=Apply for ".$this->title.' on Emploi. '.url('/invites/'.$this->slug);
    }
}
