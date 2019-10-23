<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanySize extends Model
{
    protected $fillable = [
        'lower_limit', 'upper_limit'
    ];

    public function companies(){
    	return $this->hasMany(Company::class);
    }
}
