<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use App\Jobs\EmailJob;

use App\ProductOrder;

class Invoice extends Model
{
    use Notifiable;

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
    	if($this->order_id !== null)
    	{
    		for($i=0; $i<count($this->order->productOrders); $i++)
    			$total += $this->order->productOrders[$i]->price;
    	}
    	else
            return  $this->sub_total;

        return $total;

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

    public static function generateUniqueSlug($length = 11) {
        $length = $length > 41 ? 41 : $length;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return 'EINVOICE_'.$randomString;
    }

    public function getPaidAttribute(){
        if($this->pesapal_transaction_tracking_id)
            return $this->pesapal_transaction_tracking_id;
        if($this->alternative_payment_slug)
            return $this->alternative_payment_slug;
        return false;
    }

    public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }

    public function remind($channel)
    {
        switch ($channel) {
            case 'email':
                $caption = "Emploi Invoice ".$this->slug.' is due for payment';
                $contents = "The Invoice <a href='".url('/invoice/'.$this->slug)."'>".$this->slug."</a> totalling to Ksh ".$this->total."is due for payment on Emploi. <br><br>

                <a href='".url('/invoice/'.$this->slug)."' style='padding: 0.5em; '>View Invoice</a> 

                <br>
                <h5>Description</h5>
                <p>
                ".$this->description."
                </p>

                <br>

                Kindly make arrangments and complete the full payment.
                ";
                EmailJob::dispatch($this->first_name, $this->email, 'Emploi Invoice', $caption, $contents);
                return true;
                break;
            
            default:
                return false;
                break;
        }
    }

    public function hasBeenPaid(){
        if(isset($this->order_id))
        {
            $order = $this->order;
            for($i=0; $i<count($order->productOrders); $i++)
            {
                $p = $order->productOrders[$i];

                ProductOrder::toggle($p);

                

            }
            
        }
        
    }
}
