<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;

class InvoiceController extends Controller
{
    public function __construct() {
        $this->middleware('admin', ['except' => [
            'show'
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
        return redirect('/admin/invoices/'.$invoice->id);
    }

    public function show($id)
    {
        return view('admins.invoices.show')
                ->with('invoice',Invoice::findOrFail($id));
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
