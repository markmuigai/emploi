<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalityTrait extends Model
{
    protected $fillable = [
        'name'
    ];

    public function modelSeekerPersonalityTraits(){

        return $this->hasMany(ModelSeekerPersonalityTrait::class);
    }
}
