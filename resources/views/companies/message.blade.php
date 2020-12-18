@extends('layouts.dashboard-layout')

@section('title','Emploi :: Companies')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Company')
<div class="card">
    <div class="card-body text-center">
    	{{-- @include('components.ads.responsive') --}}
        <p>
            <?php echo $message; ?>
        </p>
    </div>
</div>


@endsection