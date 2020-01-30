@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: '.$product->title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $product->title)

<div class="card">
    <div class="card-body">
        <h4 class="orange">
            <a href="/admin/products/">
                <i class="fa fa-arrow-left"></i>
            </a>
            Ksh {{ $product->price }} for {{ $product->days_duration }} days

            <a href="/admin/products/{{ $product->slug }}/edit" style="float: right;" class="btn btn-sm btn-link">Edit</a>
        </h4>

        <p>
            {{ $product->tagline }}
        </p>

        <hr>

        <div>
            <?php echo $product->description;  ?>
        </div>
        
    </div>
</div>

@endsection