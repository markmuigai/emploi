@extends('layouts.dashboard-layout')

@section('title','Emploi :: Super Admin')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Controllers Documentation')
<div class="card">
    <div class="card-body">
        <div class="dropdown">
            <a href="#" class="btn btn-green px-3" data-toggle="dropdown">Documentation<strong class="caret"></strong></a>
            <ul class="dropdown-menu">
                <li><a href="index">Index</a></li>
                <li><a href="routes">Routes</a></li>
                <li><a href="#">Controllers</a></li>
                <li><a href="views" >Views</a></li>
                <li><a href="rsi" >RSI</a></li>
            </ul>
        </div>

    <div class="text-right">
        <h2>EMPLOI DOCUMENTATION</h2>
        <p>By Obare C. Brian and David Kirarit</p>

    </div>

<h3>Controllers</h3>

<p>
	Controllers can group related request handling logic into a single class. Controllers are stored in the app/Http/Controllers directory. They can be invoked by defining routes in routes.php
</p>
<p>There are different types of controllers in this system;</p>
<h5>Basic Controllers</h5>
<p>Can be created by a simple command 'php artisan make:controller ControllerName"</p>

<h5>Controller Middleware</h5>
<p>Middleware may be assigned to the controller's routes in your route files:
Route::get('profile', 'UserController@show')->middleware('auth');
However, it is more convenient to specify middleware within your controller's constructor. Using the middleware method from your controller's constructor, you may easily assign middleware to the controller's action.</p>

class PostsController extends Controller
{<br>
    public function __construct() {<br>
        $this->middleware('employer', ['except' => [<br>
            'index','show','apply'<br>
        ]]);<br>
    }<br>

<h5>Resource Controller</h5>
<p>Laravel resource routing assigns the typical "CRUD" routes to a controller with a single line of code. For example, there is a controller that handles all HTTP requests for products. Using the make:controller Artisan command, we can quickly
create such a controller:<br>
php artisan make:controller ProductController --resource<br>
This command will generate a controller at app/Http/Controllers/ProductController.php . The
controller will contain a method for each of the available resource operations.</p>


    </div>
</div>

@endsection