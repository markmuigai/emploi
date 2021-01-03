<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CvCredit extends Model
{
    protected $fillable = [
        'user_id', 'value'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function invoiceCreditRedemption(){
    	return $this->hasOne(InvoiceCreditRedemption::class);
    }
}
