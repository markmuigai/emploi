<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\Company;
use App\Post;


class SitemapController extends Controller
{
    public function index()
	{
	  $post = Post::orderBy('created_at', 'desc')->first();
	  $blog = Blog::orderBy('created_at', 'desc')->first();
	  $company = Company::orderBy('created_at', 'desc')->first();

	  return response()->view('sitemap.index', [
	      'post' => $post,
	      'blog' => $blog,
	      'company' => $company,
	  ])->header('Content-Type', 'text/xml');
	}

	public function posts()
	{
	    $posts = Post::orderBy('created_at','DESC')->orderBy('created_at', 'desc')->where('status', '!=', 'inactive')->limit(100)->get();
	    return response()->view('sitemap.posts', [
	        'posts' => $posts,
	    ])->header('Content-Type', 'text/xml');
	}

	public function blogs()
	{
	    $blogs = Blog::orderBy('created_at', 'desc')->limit(50)->get();
	    return response()->view('sitemap.blogs', [
	        'blogs' => $blogs,
	    ])->header('Content-Type', 'text/xml');
	}

	public function companies()
	{
	    $companies = Company::where('name','not like','%sex%')->where('name','not like','%fuck%')->where('name','not like','%http%')->where('name','not like','%adult%')->where('name','not like','%crypto%')->where('name','not like','%free%')->where('name','not like','%$%')->where('name','not like','%dating%')->orderBy('featured','DESC')->orderBy('id','DESC')->limit(100)->get();
	    return response()->view('sitemap.companies', [
	        'companies' => $companies,
	    ])->header('Content-Type', 'text/xml');
	}
}
