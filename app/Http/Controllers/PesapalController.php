<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;
use App\Order;
use App\Product;
use App\ProductOrder;
use App\User;


use Auth;
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
                die('Account not registered');
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

            if(isset($invoice->id))
            {
                $invoice->remind('email');
                $message = 'Invoice '.$invoice->slug.' totalling to  Ksh '.$invoice->total.' created on Emploi. Customer: '.$invoice->first_name.', email: '.$invoice->email;
                $invoice->notify(new InvoiceCreated($message));
                return redirect('/invoice/'.$invoice->slug);
            }

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
        $invoice = Invoice::where('slug',$slug)->firstOrFail();
        

        return view('pesapal.pay')
                ->with('invoice',$invoice);
    }

    public function payRedirect(Request $request, $slug){
        $invoice = Invoice::where('slug',$slug)->firstOrFail();
        return redirect('/invoice/'.$invoice->slug);
    }

    public function ipn(Request $request)
    {
        $message = 'Pesapal Notification: '.$request->pesapal_notification_type.' Ref: '.$request->pesapal_transaction_tracking_id;
        $invoice = Invoice::first();
        $invoice->notify(new PaymentMade($message));
    }
}





















