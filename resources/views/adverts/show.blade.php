@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: '.$advert->getTitle())

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Advert Request '.$advert->id)

@section('content')

<div class="card">
    <div class="card-body row">

        <div class="col-md-6">
            <b>Created [{{ $advert->status }}]</b>
            <br>
            By: <b>{{ $advert->name }}</b> <br>
            Email: <a href="mailto:{{ $advert->email }}">{{ $advert->email }}</a> <br>
            Phone: {{ $advert->phone_number }} <br>
            On: {{ $advert->created_at }} <br>
            <hr>
            <i>
                {{ $advert->description }}
            </i>
            

        </div>


        <form method="POST" action="/admin/received-requests/{{ $advert->id }}" class="col-md-6">
            @csrf
            <h5>Notes <small>{{ $advert->notes ? 'Last updated: '.$advert->updated_at : '' }}</small></h5>
            <textarea class="form-control" name="notes" required="" rows="4" placeholder="Enter notes regarding this advert request" maxlength="500">{{ $advert->notes }}</textarea>
            <h5>Status</h5>

            <select name="status" class="form-control">
                @foreach([['Pending','pending'],['Completed','completed']] as $s)
                <option value="{{ $s[1] }}" {{ $advert->status == $s[1] ? 'selected=""' : '' }}>{{ $s[0] }}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value="Save" class="btn btn-orange">

        </form>

        


    	
	</div>

</div>

@endsection
