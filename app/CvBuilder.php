<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CvBuilder extends Model
{
    protected $fillable = [
        'email','industry', 'name','resume','phone'
    ];

    public function industry(){
    	return $this->belongsTo(Industry::class);
    }
}
