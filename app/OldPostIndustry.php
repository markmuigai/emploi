<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OldPostIndustry extends Model
{
    protected $fillable = [
        'old_post_id', 'industry_id'
    ];

    public function oldPost(){
    	return $this->belongsTo(OldPost::class,'old_post_id');
    }

    public function industry(){
    	return $this->belongsTo(Industry::class);
    }
}
