<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\BlogCategory;
use App\Comment;

use Auth;
use Storage;
use Image;

class BlogController extends Controller
{
    public function __construct() {
        $this->middleware('blogger', ['except' => [
            'index','show'
        ]]);
    }

    public function admin(Request $request)
    {
        $user = Auth::user();
        //$blogger = Blogger::findOrFail($id);
        if(!$user->canUseBloggingPanel())
            return abort(403);
        $blogs = Blog::where('user_id',$user->id)->paginate(20);
        return view('admins.bloggers.show')
                ->with('blogger',$user->blogger)
                ->with('blogs',$blogs);
        //$blogs = Blog::where('user_id',$user->id)->paginate(20)
    }

    public function index()
    {
        return view('blog.index')
                ->with('pageTitle','Emploi Career Center')
                ->with('blogs',Blog::where('status','active')->orderBy('id','desc')->paginate(12));
    }

    public function create()
    {
        $user = Auth::user();
        if(!isset($user->blogger))
            return abort(403);
        return view('blog.create')
                ->with('categories', BlogCategory::where('status','active')->get());
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(!$user->canUseBloggingPanel())
            return abort(403);

        $featured_image = $request->file('featured_image');
        $featured_image_url = time() . '.' . $featured_image->getClientOriginalExtension();
        $storage_path = storage_path().'/app/public/blogs/'.$featured_image_url;
        $watermark = Image::make(public_path('/images/logo.png'));   
        // $featured_image_url = basename(Storage::put($storage_path, $request->featured_image));

        Image::make($featured_image)->resize(900, 600)->insert($watermark, 'bottom-right', 50, 50)->save($storage_path);
        

        if(isset($request->other_image))
        {
            $other_image = $request->file('other_image');
            $other_image_url = time() . '.' . $other_image->getClientOriginalExtension();
            $storage_path = storage_path().'/app/public/blogs/'.$other_image_url;
            //$watermark = Image::make(public_path('/images/logo.png'));   

            Image::make($other_image)->resize(900, 600)->insert($watermark, 'bottom-right', 50, 50)->save($storage_path);

            $other_image_url = basename(Storage::put($storage_path, $request->other_image));
        }
        else
        {
            $other_image_url = null;
        }
        $slug = strtolower($request->title);
        $slug = explode(" ", $slug);
        $slug = implode("-", $slug);
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($slug));

        $blog_status = Auth::user()->role == 'admin' ? 'active' : 'pending';

        $b = Blog::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'contents' => $request->contents,
            'slug' => $slug,
            'blog_category_id' => $request->category,
            'image1' => $featured_image_url,
            'image2' => $other_image_url,
            'status' => $blog_status
        ]);
        if(Auth::user()->role == 'admin')
            return redirect('/admin/blog');
        return redirect('/my-blogs');
    }

    public function show($id, Request $request)
    {
        if($id == 'search')
        {
            $q = isset($request->q) ? $request->q : ' ';
            $blogs = Blog::where('status','active')->where('title','like','%'.$q.'%')
                    ->where('status','active')
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
                    ->where('status','active')
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
        $user = Auth::user();
        $blog = Blog::where('slug',$id)->firstOrFail();

        if($blog->user_id != $user->id && $user->role != 'admin')
            return abort(403);
        return view('blog.edit')
                ->with('categories', BlogCategory::where('status','active')->get())
                ->with('blog',$blog);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $blog = Blog::where('slug',$id)->firstOrFail();

        if($blog->user_id != $user->id && $user->role != 'admin')
            return abort(403);

        $blog->title = $request->title;
        $blog->blog_category_id = $request->category;
        $blog->contents = $request->contents;
        $blog->status = $request->status;

        Storage::disk('local')->makeDirectory('public/bogs' . $id);
        $storage_path = '/public/blogs/';
        if(isset($request->featured_image))
        {
            $featured_image = $request->file('featured_image');
            $featured_image_url = time() . '.' . $featured_image->getClientOriginalExtension();
            $storage_path = storage_path().'/app/public/blogs/'.$featured_image_url;
            $watermark = Image::make(public_path('/images/logo.png'));   

            Image::make($featured_image)->resize(900, 600)->insert($watermark, 'bottom-right', 50, 50)->save($storage_path);
            $oldImage = storage_path().'/app/public/blogs/'.$blog->image1;

            if(file_exists($oldImage))
                unset($oldImage);
            $blog->image1 = $featured_image_url;
        }
        if(isset($request->other_image))
        {
            $other_image = $request->file('other_image');
            $featured_image_url = time() . '.' . $other_image->getClientOriginalExtension();
            $storage_path = storage_path().'/app/public/blogs/'.$featured_image_url;
            $watermark = Image::make(public_path('/images/logo.png'));   

            Image::make($other_image)->resize(900, 600)->insert($watermark, 'bottom-right', 50, 50)->save($storage_path);
            $oldImage = storage_path().'/app/public/blogs/'.$blog->image1;

            if(file_exists($oldImage))
                unset($oldImage);
            $blog->image2 = $featured_image_url;
        }
        $blog->updated_at = now();
        $blog->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
