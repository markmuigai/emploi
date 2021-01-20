<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;


class Advert extends Model
{
    use Rememberable;
    public $rememberFor = 30;

    protected $fillable = [
        // 'name', 'phone_number', 'email','title','description', 'notes','status'
    ];

    public function getTitle(){
    	return $this->title ? $this->title : 'Job Title Unavailable';
    }
}
