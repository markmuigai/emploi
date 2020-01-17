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

    public static function creditFor($email, $points = 10)
    {
    	$r = Referral::where('email',$email)->first();
    	if(isset($r->id) && isset($r->user_id))
    	{
    		Credit::create([
    			'user_id' => $r->user_id,
    			'value' => $points
    		]);
    		$r->status = 'completed';
    		return $r->save();
    	}
        return false;

    }

    
}
