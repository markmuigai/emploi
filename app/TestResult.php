<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    // Get the associated user
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
