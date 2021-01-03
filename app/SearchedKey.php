<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchedKey extends Model
{
    protected $fillable = [
        'keywords', 'location_id','industry_id','vacancy_type_id','user_id','domain'
    ];
}
