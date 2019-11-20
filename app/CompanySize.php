<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanySize extends Model
{
    protected $fillable = [
        'lower_limit', 'upper_limit','title'
    ];

    public function companies(){
    	return $this->hasMany(Company::class);
    }

    public function seekerPreviousCompanySizes(){
    	return $this->hasMany(SeekerPreviousCompanySize::class);
    }
}
