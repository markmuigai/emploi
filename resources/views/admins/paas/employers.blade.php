@extends('layouts.dashboard-layout')

@section('title','Emploi :: Admin Employers')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Employers')

<div class="card">
    <div class="card-body">
       <!--  <form>
            <input type="text" placeholder="Search here" name="q" required="" class="form-control">
        </form>
        <br> -->
        @include('components.ads.responsive')
        @forelse($employers as $e)
        <?php 
            $c = App\Employer::where('user_id', $e->user_id)->first();
        ?>
        <div class="row align-items-center">
            <div class=" col-lg-7 col-md-6">
                <h4>{{ $e->name }}</h4>
                <h5>Company: {{ $c->company_name }}</h5> 
                <a href="mailto:{{ $e->email }}">{{ $e->email }}</a> || <a href="tel:{{ $e->phone_number }}">{{ $e->phone_number }}</a><br>
                 Subscribed: {{ $e->created_at }}
                </p>
            </div>
        </div>
        <hr>
        @empty
        <p class="text-center">No employers have been found</p>
        @endforelse
    </div>
</div>

{{ $employers->links() }}


@endsection
