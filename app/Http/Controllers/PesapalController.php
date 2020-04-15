<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Contact;
use App\InviteLink;
use App\Invoice;
use App\Order;
use App\Product;
use App\ProductOrder;
use App\Referral;
use App\User;


use Auth;
use Session;
use App\Jobs\EmailJob;
use App\Notifications\InvoiceCreated;
use App\Notifications\PaymentMade;

class PesapalController extends Controller
{
    public function checkout(Request $request)
    {

        if(isset($request->product))
            $request->session()->put('product', $request->product);
    	
    	if($request->session()->has('product') && !isset($request->createInvoice))
    	{
    		$product = Product::where('slug',session('product'))->firstOrFail();
    		return view('pesapal.checkout')
    				->with('product',$product);
    	}

        if(isset($request->createInvoice))
        {
            $product = Product::where('slug',session('product'))->firstOrFail();
            $user = false;
            if(isset(Auth::user()->id))
            {
                $user = Auth::user();
            }
            else
            {
                $user = User::where('email',$request->email)->first();
            }
            if(!isset($user->id))
            {
                $request->session()->put('returnToUrl', url('/checkout'));


                $full_name = $request->first_name.' '.$request->last_name;
                $username = explode(" ", $full_name);
                $username = strtolower(implode("", $username).rand(1000,30000));
                $username = explode(".", $username);
                $username = implode('',$username);

                $password = User::generateRandomString(10);

                $user = User::create([
                    'name' => $full_name,
                    'email' => $request->email,
                    'username' => $username,
                    'email_verification' => User::generateRandomString(10),
                    'password' => Hash::make($password),
                ]);



                $credited = Referral::creditFor($request->email,20);

                if(!$credited && Session::has('invite_id'))
                {
                    $invite_id = Session::get('invite_id');
                    $link = InviteLink::find($invite_id);
                    if(isset($link->id))
                    {
                        Referral::create([
                            'user_id' => $link->user_id, 
                            'name' => $user->name, 
                            'email' => $user->email
                        ]);

                        Referral::creditFor($user->email,20);
                    }

                    //Session::forget('invite_id');
                }

                $caption = "Thank you for registering your profile.";
                $contents = "Here are your login credentials for Emploi: <br>
                username: $username <br>
                password: $password

                <br><br>
                Log in to finish setting up your account to get the most our of Emploi.
                ";
                EmailJob::dispatch($user->name, $user->email, 'Emploi Login Credentials', $caption, $contents);
            }

            $product = Product::where('slug',session('product'))->firstOrFail();

            $order = Order::create([
                'user_id' => $user->id, 
                'slug' => Order::generateUniqueSlug(19)
            ]);

            ProductOrder::create([
                'order_id' => $order->id, 
                'product_id' => $product->id,
                'days_duration' => $product->days_duration,
                'price' => $product->price
            ]);

            $invoice = Invoice::create([
                'order_id' => $order->id,
                'slug' => Invoice::generateUniqueSlug(11),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => isset($request->phone_number) ? $request->prefix.$request->phone_number : null,
                'email' => $request->email,
                'description' => $product->description
            ]);

            $request->session()->forget('product');

            if(isset($invoice->id))
            {
                $invoice->remind('email');
                $message = 'Invoice '.$invoice->slug.' totalling to  Ksh '.$invoice->total.' created on Emploi. Customer: '.$invoice->first_name.', email: '.$invoice->email;
                if(app()->environment('production'))
                    $invoice->notify(new InvoiceCreated($message));
                return redirect('/invoice/'.$invoice->slug);
            }

            return view('pesapal.error')
                    ->with('title','An Error Occurred')
                    ->with('message','We were unable to submit your order. Kindly try again after a while.');

            die('Something happened on our end');

            
        }

    	//return redirect()->back();

    	if(!isset(Auth::user()->id))
    	{
    		return redirect('/join');
    	}

    	if(Auth::user()->role == 'employer')
    	{
    		return redirect('/employers/publish');
    	}

    	return redirect('/job-seekers/services');
    	
    }

    public function pay(Request $request, $slug){
        $invoice = Invoice::where('slug',$slug)->first();
        if(!isset($invoice->id))
            return redirect('/');
        

        return view('pesapal.pay')
                ->with('invoice',$invoice);
    }

    public function payRedirect(Request $request, $slug){
        $invoice = Invoice::where('slug',$slug)->first();
        if(!isset($invoice->id))
            return redirect('/');
        return redirect('/invoice/'.$invoice->slug);
    }

    public function ipn(Request $request)
    {
        $invoice = Invoice::where('slug',$request->pesapal_merchant_reference)->first();
        if(isset($invoice->id) && $invoice->pesapal_transaction_tracking_id == null)
        {
            $invoice->pesapal_transaction_tracking_id = $request->pesapal_transaction_tracking_id;
            $invoice->updated_at = now();
            $invoice->save();
            $invoice->hasBeenPaid();

            $message = $invoice->slug.' Paid. Pesapal Ref: '.$request->pesapal_transaction_tracking_id;
            $invoice->notify(new PaymentMade($message));
        }
        else
        {
            $invoice = Invoice::first();
            $message = 'Pesapal Notification: '.$request->pesapal_notification_type.' Ref: '.$request->pesapal_transaction_tracking_id;
            $invoice->notify(new PaymentMade($message));
        }
        
        
    }
}





















