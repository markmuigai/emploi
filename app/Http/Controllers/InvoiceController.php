<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Invoice;
use App\Jobs\EmailJob;
use App\Notifications\InvoiceCreated;
use App\Notifications\InvoicePaid;

class InvoiceController extends Controller
{
    public function __construct() {
        $this->middleware('admin', ['except' => [
            'show','payment'
        ]]);
    }   

    public function index(Request $request)
    {
        return view('admins.invoices.index')
            ->with('invoices',Invoice::orderBy('id','DESC')->paginate(20));
    }

    public function create()
    {
        return view('admins.invoices.create');
    }

    public function store(Request $request)
    {
        $invoice = Invoice::create([
            'slug' => Invoice::generateUniqueSlug(11),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => isset($request->phone_number) ? $request->phone_number : null,
            'email' => $request->email,
            'description' => $request->description,
            'sub_total' => $request->sub_total
        ]);
        if(isset($invoice->id))
        {
            $message = 'Invoice '.$invoice->slug.' totalling to  Ksh '.$invoice->total.' created on Emploi. Customer: '.$invoice->first_name.', email: '.$invoice->email;
            $invoice->remind('email');
            $invoice->notify(new InvoiceCreated($message));
            return redirect('/admin/invoices/'.$invoice->slug);
        }

        return redirect()->back();
        
    }

    public function show($slug)
    {
        return view('admins.invoices.show')
                ->with('invoice',Invoice::where('slug',$slug)->firstOrFail());
    }

    public function remindViaEmail($slug)
    {
        $invoice = Invoice::where('slug',$slug)->firstOrFail();
        if(!$invoice->paid)
        {
            $invoice->remind('email');
            return view('admins.invoices.reminded')
                    ->with('invoice',$invoice);
        }

        return redirect('/admin/invoices/'.$invoice->slug);

    }

    public function edit($id)
    {
        //
    }

    public function payment(Request $request, $slug)
    {
        $invoice = Invoice::where('slug',$slug)->firstOrFail();
        if(!$invoice->pesapal_transaction_tracking_id)
        {
            //$invoice->pesapal_merchant_reference = $request->pesapal_merchant_reference;
            $invoice->pesapal_transaction_tracking_id = $request->pesapal_transaction_tracking_id;
            $invoice->updated_at = now();
            $invoice->save();
            $invoice->hasBeenPaid();
        }
        return view('pesapal.paid')
                ->with('invoice',$invoice);
        return $request->all();
    }

    public function update(Request $request, $slug)
    {
        $invoice = Invoice::where('slug',$slug)->firstOrFail();
        if($invoice->alternative_payment_slug)
            return abort(403);
        $invoice->alternative_payment_slug = Auth::user()->id.'_'.$request->alternative_payment_slug;
        $invoice->updated_at = now();
        $invoice->save();
        $invoice->hasBeenPaid();
        $message = 'Invoice '.$invoice->slug.' totalling to  Ksh '.$invoice->total.' was marked paid by '.Auth::user()->name.'. Payment Reference: '.$invoice->alternative_payment_slug;
        $invoice->notify(new InvoicePaid($message));

        $caption = "Emploi Invoice ".$invoice->slug.' was paid';
        $contents = "The Invoice <a href='".url('/invoice/'.$invoice->slug)."'>".$invoice->slug."</a> totalling to Ksh ".$invoice->total."is due was paid succesfully <br><br>

        <a href='".url('/invoice/'.$invoice->slug)."' style='padding: 0.5em; '>View Invoice</a> 

        <br>
        <h5>Description</h5>
        <p>
        ".$invoice->description."
        </p>

        <br>

        Thank you for chosing Emploi.
        ";
        EmailJob::dispatch($invoice->first_name, $invoice->email, 'Emploi Invoice Paid', $caption, $contents);

        return redirect('/admin/invoices/'.$invoice->slug);
    }

    public function destroy($id)
    {
        //
    }
}
