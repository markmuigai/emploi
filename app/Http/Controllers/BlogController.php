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
                ->with('pageTitle','Emploi Career Center')
                ->with('blogs',Blog::orderBy('id','desc')->paginate(12));
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

    public function show($id, Request $request)
    {
        if($id == 'search')
        {
            $q = isset($request->q) ? $request->q : ' ';
            $blogs = Blog::where('status','active')->where('title','like','%'.$q.'%')
                    ->orderBy('id','DESC')
                    ->paginate(12);
            return view('blog.index')
                    ->with('pageTitle',"Blog Search Results \"$q\"")
                    ->with('q',$q)
                ->with('blogs',$blogs);
        }
        $c = BlogCategory::where('slug',$id)->where('status','active')->first();
        if(isset($c->id))
        {
            $blogs = Blog::where('status','active')->where('blog_category_id',$c->id)
                    ->orderBy('id','DESC')
                    ->paginate(12);
            return view('blog.index')
                    ->with('blogCategory',$c->id)
                    ->with('pageTitle','Emploi '.$c->name.' Blog')
                ->with('blogs',$blogs);
        }
        $blog = Blog::where('slug',$id)->where('status','active')->firstOrFail();
        return view('blog.show')
                ->with('blog',$blog);
    }

    public function edit($id)
    {
        $blog = Blog::where('slug',$id)->firstOrFail();
        return view('admins.blog.edit')
                ->with('categories', BlogCategory::where('status','active')->get())
                ->with('blog',$blog);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::where('slug',$id)->firstOrFail();
        $blog->title = $request->title;
        $blog->blog_category_id = $request->category;
        $blog->contents = $request->contents;

        $storage_path = '/public/blogs/';
        if(isset($request->featured_image))
        {
            $blog->image1 = basename(Storage::put($storage_path, $request->featured_image));
        }
        if(isset($request->other_image))
        {
            $blog->image2 = basename(Storage::put($storage_path, $request->other_image));
        }

        $blog->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
