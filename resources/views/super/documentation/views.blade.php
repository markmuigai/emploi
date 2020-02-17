@extends('layouts.dashboard-layout')

@section('title','Emploi :: Super Admin')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Documentation')
<div class="card">
    <div class="card-body">
        <div class="text-right">
            <h2>EMPLOI DOCUMENTATION</h2>
            <p>By Obare C. Brian and David Kirarit</p>

        </div>

<h3>Views</h3>
<p>Views contain the logic on how to present data to the user. In a web
application, typically they are used to generate the HTML output that is sent back to users with
each response.</p>
<p>Views are stored in the resources/views directory.
A view can be called using the view helper function:
view(string $path, array $data = [])
The first parameter of the helper is the path to a view file, and the second parameter is an optional
array of data to pass to the view.
Therefore, to call the resources/views/index.blade.php , you would use:
view('index');</p>
View files in subfolders within the resources/views directory, such as
resources/views/employers/dashboard/index.blade.php , can be called using dot notation:
view('employers.dashboard.index');</p>


    </div>
</div>

@endsection