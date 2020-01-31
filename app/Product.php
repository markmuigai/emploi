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

    public function getPrice(){
        return 'Ksh '.$this->price;
    }

    public static function generateUniqueSlug($length = 20) {
    	$length = $length > 20 ? 20 : $length;
        $characters = '0123456789abcdefghjklmnpqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return 'product_'.$randomString;
    }

    public function applicableDiscountFor(User $user){
        $max_credits_discount = round($this->price * 0.3);
        $discount = 0;
        if($user->totalCredits * 0.1 <= $max_credits_discount)
            return $user->totalCredits * 0.1;
        return $max_credits_discount;
    }
}
