<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'title', 'description', 'permission_id'
    ];

    public function permission(){
    	return $this->belongsTo(Permission::class);
    }
}
