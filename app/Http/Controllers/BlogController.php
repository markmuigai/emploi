<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\BlogCategory;

use Auth;
use Storage;

class BlogController extends Controller
{
    public function __construct() {
        $this->middleware('admin', ['except' => [
            'index','show'
        ]]);
    }

    public function index()
    {
        return view('blog.index')
                ->with('blogs',Blog::active(20));
    }

    public function create()
    {
        return view('blog.create')
                ->with('categories', BlogCategory::where('status','active')->get());
    }

    public function store(Request $request)
    {
        $storage_path = '/public/blogs/';
        $featured_image_url = basename(Storage::put($storage_path, $request->featured_image));
        

        if(isset($request->other_image))
        {
            $other_image_url = basename(Storage::put($storage_path, $request->other_image));
        }
        else
        {
            $other_image_url = null;
        }
        $slug = strtolower($request->title);
        $slug = explode(" ", $slug);
        $slug = implode("-", $slug);
        $b = Blog::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'contents' => $request->contents,
            'slug' => $slug,
            'blog_category_id' => $request->category,
            'image1' => $featured_image_url,
            'image2' => $other_image_url,
            'status' => 'active'
        ]);
        return redirect('/admin/blog');
    }

    public function show($id)
    {
        $c = BlogCategory::where('slug',$id)->where('status','active')->first();
        if(isset($c->id))
        {
            $blogs = Blog::where('status','active')->where('blog_category_id',$c->id)->paginate(20);
            return view('blog.index')
                ->with('links',true)
                ->with('blogs',$blogs);
        }
        $blog = Blog::where('slug',$id)->where('status','active')->firstOrFail();
        return view('blog.show')
                ->with('blog',$blog);
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
