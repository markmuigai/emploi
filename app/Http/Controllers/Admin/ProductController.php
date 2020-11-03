<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        return view('admins.products.index')
                ->with('products',Product::orderBy('title')->paginate(10));
    }

    public function create()
    {
        return view('admins.products.create');
    }

    public function store(Request $request)
    {
        $p = Product::create([
            'slug' => Product::generateUniqueSlug(11), 
            'title' => $request->title, 
            'tagline' => $request->tagline, 
            'description' => $request->description, 
            'price' => $request->price, 
            'days_duration' => $request->days_duration
        ]);

        return redirect('/admin/products/'.$p->slug);
    }

    public function show($slug)
    {
        return view('admins.products.show')
                ->with('product',Product::where('slug',$slug)->firstOrFail());
    }

    public function edit($slug)
    {
        return view('admins.products.edit')
                ->with('product',Product::where('slug',$slug)->firstOrFail());
    }

    public function update(Request $request, $slug)
    {
        $p = Product::where('slug',$slug)->firstOrFail();
        $p->title = $request->title;
        $p->tagline = $request->tagline;
        $p->description = $request->description;
        $p->price = $request->price;
        $p->days_duration = $request->days_duration;
        $p->save();
        return redirect('/admin/products/'.$p->slug);
    }

    public function destroy($id)
    {
        //
    }
}
