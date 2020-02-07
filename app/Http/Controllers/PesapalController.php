<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;
use App\Product;

use Auth;

class PesapalController extends Controller
{
    public function checkout(Request $request)
    {
    	
    	if(isset($request->product))
    	{
    		$product = Product::where('slug',$request->product)->firstOrFail();
    		return view('pesapal.checkout')
    				->with('product',$product);
    	}

    	return redirect()->back();

    	if(!isset(Auth::user()->id))
    	{
    		return redirect('/employers/rate-card');
    	}

    	if(Auth::user()->role == 'employer')
    	{
    		return redirect('/employers/rate-card');
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
}
