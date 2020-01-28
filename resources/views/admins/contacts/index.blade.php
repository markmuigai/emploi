@extends('layouts.dashboard-layout')

@section('title','Emploi :: Admin Contacts')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Contacts')


<div class="card">
    <div class="card-body">
        @include('components.ads.responsive')
        @forelse($contacts as $c)
        <div class="row align-items-center">
            <div class=" col-lg-7 col-md-6">
                <h4>{{ $c->name }} <small>on {{ $c->created_at }}</small></h4>
                <b>{{ $c->code }}</b>
                <p>
                    <a href="mailto:{{ $c->email }}">{{ $c->email }}</a> || <a href="tel:{{ $c->phone_number }}">{{ $c->phone_number }}</a>
                </p>
                <hr>
                {{ $c->message }}
            </div>
            <div class="col-lg-5 col-md-6">
                @if($c->resolver)
                    Resolved by <b>{{ $c->resolver->name }}</b> on {{ $c->resolved_on }}
                    <hr>
                    <i>{{ $c->resolve_notes }}</i>
                
                @else

                <form method="post" action="/admin/saveResolution">
                    @csrf
                    <input type="hidden" name="contact_id" value="{{ $c->id }}">
                    <textarea class="form-control" rows="3" name="resolve_notes" placeholder="Resolve Notes" required=""></textarea>
                    <input type="submit" name="" value="Resolve" class="btn btn-primary">
                </form>

                @endif
                
            </div>
        </div>
        <hr>
        @empty
        <p class="text-center">No contacts have been received</p>
        @endforelse
    </div>
</div>

{{ $contacts->links() }}


@endsection
