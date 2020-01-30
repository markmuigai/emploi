<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceCreditRedemption extends Model
{
    protected $fillable = [
        'credit_id', 'invoice_id'
    ];

    public function credit(){
    	return $this->belongsTo(Credit::class);
    }

    public function invoice(){
    	return $this->belongsTo(Invoice::class);
    }
}
