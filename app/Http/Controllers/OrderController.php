<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Invoice;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $order = false;
        // if(isset(Auth::user()->id))
        // {
        //     $order = Order::create([
        //         'user_id' => Auth::user()->id, 
        //         'slug' => Order::generateUniqueSlug()
        //     ]);
        // }

        // $invoice = Invoice::create([
        //     'order_id' => isset($order->id) ? $order->id : null, 
        //     'slug' => Invoice::generateUniqueSlug(),
        //     'first_name','last_name','phone_number','email','description','sub_total','pesapal_merchant_reference','pesapal_transaction_tracking_id','alternative_payment_slug'
        // ]);

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
