@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: '.$advert->getTitle())

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Advert Request '.$advert->id)

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ $advert->title }}
                    <span class="badge badge-success">{{ $advert->status }}</span>
                </h3>
                <p>{{ $advert->created_at }}</p>
                <p><strong>Submitted By:</strong> {{ $advert->name }}</p>
                <p><strong>Email:</strong> <a href="mailto:{{ $advert->email }}" class="orange">{{ $advert->email }}</a></p>
                <p><strong>Phone:</strong> {{ $advert->phone_number }}</p>
                <p>{{ $advert->description }}</p>
            </div>
            <div class="col-md-6">
                <form method="POST" action="/admin/received-requests/{{ $advert->id }}">
                    @csrf
                    <div class="form-group">
                        <label for="notes">Notes <small>{{ $advert->notes ? 'Last updated: '.$advert->updated_at : '' }}</small></label>
                        <textarea class="form-control" name="notes" required="" rows="4" placeholder="Enter notes regarding this advert request" maxlength="500">{{ $advert->notes }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="custom-select">
                            @foreach([['Pending','pending'],['Completed','completed']] as $s)
                            <option value="{{ $s[1] }}" {{ $advert->status == $s[1] ? 'selected=""' : '' }}>{{ $s[0] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-orange" name="button">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
