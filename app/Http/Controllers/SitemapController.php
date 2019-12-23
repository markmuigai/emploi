<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Blog;

class SitemapController extends Controller
{
    public function index()
	{
	  $post = Post::orderBy('created_at', 'desc')->first();
	  $blog = Blog::orderBy('created_at', 'desc')->first();

	  return response()->view('sitemap.index', [
	      'post' => $post,
	      'blog' => $blog,
	  ])->header('Content-Type', 'text/xml');
	}

	public function posts()
	{
	    $posts = Post::orderBy('featured')->orderBy('created_at', 'desc')->where('status', '!=', 'inactive')->get();
	    return response()->view('sitemap.posts', [
	        'posts' => $posts,
	    ])->header('Content-Type', 'text/xml');
	}

	public function blogs()
	{
	    $blogs = Blog::orderBy('created_at', 'desc')->get();
	    return response()->view('sitemap.blogs', [
	        'blogs' => $blogs,
	    ])->header('Content-Type', 'text/xml');
	}
}
