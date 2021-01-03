<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerPreviousCompanySize extends Model
{
    protected $fillable = [
        'job_application_id','name', 'company_size_id'
    ];

    public function jobApplication(){
    	return $this->belongsTo(JobApplication::class);
    }

    public function companySize(){
    	return $this->belongsTo(CompanySize::class);
    }
}
