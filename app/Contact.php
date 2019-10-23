<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'code', 'name', 'email', 'phone_number', 'message','resolved_by','resolved_on','resolve_notes'
    ];
}
