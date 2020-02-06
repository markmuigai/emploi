@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Products')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Products')

<div class="card">
    <div class="card-body">
        <h4>
            <a href="/admin"><i class="fa fa-arrow-left"></i></a>
            Products on sale 
            @if(count($products) > 0)
                <a href="/admin/products/create" style="float: right;" class="btn btn-link ">Create</a>
            @endif
        </h4>
        <hr>
        <div>
            @forelse($products as $p)
                <div class="row">
                    <div class="col-8">
                        <b><a href="/admin/products/{{ $p->slug }}">{{ $p->title }}</a></b>
                        <br>
                        {{ $p->tagline }}
                    </div>
                    <div class="col-4 text-right">
                        <p>
                            Price: Ksh {{ $p->price }} for {{ $p->days_duration  }} days<br>
                            <a href="/admin/products/{{ $p->slug }}" class="btn btn-sm btn-default">view</a>
                        </p>
                    </div>
                </div>
                <hr>
            @empty
                <div class="text-center">
                    <p>No Products have been created. <br><br> <a href="/admin/products/create" class="btn btn-sm btn-orange">create</a></p>
                </div>
            @endforelse
        </div>
        
    </div>
</div>

@endsection