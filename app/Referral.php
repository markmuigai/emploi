<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Credit;
use App\User;

class Referral extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email','status'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public static function creditFor($email)
    {
    	$r = Referral::where('email',$email)->first();
    	if(isset($r->id) && isset($r->user_id))
    	{
    		Credit::create([
    			'user_id' => $r->user_id,
    			'value' => 10
    		]);
    		$r->status = 'completed';
    		$r->save();
    	}

    }

    
}
