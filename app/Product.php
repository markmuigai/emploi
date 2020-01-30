<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'slug', 'title', 'tagline', 'description', 'price', 'days_duration'
    ];

    public function productOrders(){
    	return $this->hasMany(ProductOrder::class);
    }

    public static function generateUniqueSlug($length = 20) {
    	$length = $length > 20 ? 20 : $length;
        $characters = '0123456789abcdefghjklmnpqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
