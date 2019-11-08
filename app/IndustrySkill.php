<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustrySkill extends Model
{
    protected $fillable = [
        'name','industry_id'
    ];

    public function industry(){
    	return $this->belongsTo(Industry::class);
    }
}
