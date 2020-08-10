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
                $contents = "The Invoice <a href='".url('/invoice/'.$this->slug)."'>".$this->slug."</a> totalling to Ksh ".$this->total." is due for payment on Emploi. <br><br>

                <a href='".url('/invoice/'.$this->slug)."' style='padding: 0.5em; '>View Invoice</a> 

                <br><br>
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
    public function remindPro($channel)
    {
        switch ($channel) {
            case 'email':
                $caption = "Emploi Invoice ".$this->slug.' is due for payment';
                $contents = "The Invoice <a href='".url('/invoice/'.$this->slug)."'>".$this->slug."</a> totalling to Ksh ".$this->total." is due for payment on Emploi. <br><br>

                <a href='".url('/invoice/'.$this->slug)."' style='padding: 0.5em; '>View Invoice</a> 

                <br><br>
                <p>Purchase this Pro plan and you will be entitled to get real-time notifications when;</p>
                <ul>
                     <li>You’ve been shortlisted;It is really challenging for employers to respond to every candidate and therefore the package gives you an instant update on your application progress whether shortlisted or rejected with possible reasons for rejection. This will as well save your time in the job search process.</li>
                     <li>Your profile is viewed by employers;This lets you know when your application has been opened by the employer. If you have applied directly through Emploi, then you will receive this message when an employer reads your resume through their Emploi account.</li>
                     <li>Your CV is requested; The package enables you to get an update on whether an employer has requested your CV i.e.if the employer decides that they want to interview you, they will contact you directly with more information</li>
                </ul>
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

    public function remindSpotlight($channel)
    {
        switch ($channel) {
            case 'email':
                $caption = "Emploi Invoice ".$this->slug.' is due for payment';
                $contents = "The Invoice <a href='".url('/invoice/'.$this->slug)."'>".$this->slug."</a> totalling to Ksh ".$this->total." is due for payment on Emploi. <br><br>

                <a href='".url('/invoice/'.$this->slug)."' style='padding: 0.5em; '>View Invoice</a> 

                <br><br>
                <p>Purchase the Featured Job Seeker Package(Spotlight) and you will be entitled to get real-time notifications when;</p>
                <ul>
                    <li>You’ve been shortlisted;It is really challenging for employers to respond to every candidate and therefore the package gives you an instant update on your application progress whether shortlisted or rejected with possible reasons for rejection. This will as well save your time in the job search process.</li>
                    <li>Your profile is viewed by employers;This lets you know when your application has been opened by the employer. If you have applied directly through Emploi then you will receive this message when an employer reads your resume through their Emploi account.</li>
                    <li>Your CV is requested; The package enables you to get an update on whether an employer has requested your CV i.e.If the employer decides that they want to interview you, they will contact you directly with more information.</li>
                </ul>
                    <p>Additionally, your profile will rank first in applications and searches; The package enables your profile to get a high ranking on applications and searches as it appears on all slots of Emploi's search pages. This makes you stay ahead of your competition and get the attention that your job deserves.</p>
                    <p>You will also get real-time analytics of your shortlist, applications and vacancies; The package enables you to get a detailed report on all your shortlists and applications.</p>
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

    public function maskedEmail($minLength = 3, $maxLength = 10, $mask = "***") {
        $email = $this->email;
        $atPos = strrpos($email, "@");
        $name = substr($email, 0, $atPos);
        $len = strlen($name);
        $domain = substr($email, $atPos);

        if (($len / 2) < $maxLength) $maxLength = ($len / 2);

        $shortenedEmail = (($len > $minLength) ? substr($name, 0, $maxLength) : "");
        return  "{$shortenedEmail}{$mask}{$domain}";
    }

    // public function obfuscatedEmail()
    // {
    //     $email = $this->email;
    //     $em   = explode("@",$email);
    //     $name = implode(array_slice($em, 0, count($em)-1), '@');
    //     $len  = floor(strlen($name)/2);

    //     return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);   
    // }
}
