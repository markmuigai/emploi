<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'slug'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public static function generateUniqueSlug($length = 100) {
    	$length = $length > 100 ? 100 : $length;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function invoice(){
    	return $this->hasOne(Invoice::class);
    }

    public function productOrders(){
    	return $this->hasMany(ProductOrder::class);
    }
}
