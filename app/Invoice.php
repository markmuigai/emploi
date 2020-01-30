<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'order_id', 'slug','first_name','last_name','phone_number','email','description','sub_total','pesapal_merchant_reference','pesapal_transaction_tracking_id','alternative_payment_slug'
    ];

    public function order(){
    	return $this->belongsTo(Order::class);
    }

    public function invoiceCreditRedemptions(){
    	return $this->hasOne(InvoiceCreditRedemption::class);
    }

    public function getTotalAttribute(){
    	$total = 0;
    	if(count($this->order->productOrders) > 0)
    	{
    		for($i=0; $i<count($this->order->productOrders); $i++)
    			$total += $this->order->productOrders[$i]->price;
    	}
    	else
    		$total = $this->sub_total;

    	$total_credits = 0;
    	if(count($this->invoiceCreditRedemptions) > 0)
    	{
    		for($i=0; $i<count($this->invoiceCreditRedemptions); $i++)
    			$total_credits += $this->invoiceCreditRedemptions[$i]->credit->value;
    	}

    	$discount = round($total_credits * 0.1);

    	$max_price_discount = $total * 0.3;

    	if($discount > $max_price_discount)
    		$discount = $max_price_discount;

    	return $total - $discount;

    }
}
