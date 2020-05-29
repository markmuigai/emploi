<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\CvCredit;
use App\User;
use DB;

use Auth;
use App\Jobs\EmailJob;

class CvReferral extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email','status'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function cVcreditFor($email, $points = 15)
    {
        $r = CvReferral::where('email',$email)->first();
        $user = CvCredit::where('user_id',$r->user_id)->first();

        if($user)
        {
            CvCredit::where('user_id', $r->user_id)->update(['value' => DB::raw('value + 15')]);
             $r->status = 'completed';
            return $r->save();
        }      
        
        if(!$user)
        {
            CvCredit::create([
                'user_id' => $r->user_id,
                'value' => $points
            ]);
            $r->status = 'completed';
            return $r->save();
        }
        return false;

    }
   
}
