@extends('layouts.dashboard-layout')

@section('title','Edit Event')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title','Edit '.$meetup->name)
@section('content')

<?php 
$event = $meetup;
?>

<form method="POST" action="/events/{{ $event->slug }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header">
            <h5 class="orange">Organizer Contacts</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="email">
                    Email <b style="color: red">*</b>
                </label>
                @error('email')
                <p class="text-danger"> * Email invalid *</p>
                @enderror
                <input type="email" required="" value="{{ old('email') ? old('email') : $meetup->email }}" name="email" path="email" id="email" class="form-control" maxlength="50" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    
    
    <div class="card">
        <div class="card-header">
            <h5 class="orange">Event</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name <b style="color: red">*</b></label>
                @error('name')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
                <input type="text" required="" name="name" id="name" class="form-control" maxlength="200" value="{{ old('name') ? old('name') : $event->name }}" />
            </div>
            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="address">Address  <b style="color: red">*</b></label>
                    @error('address')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <textarea class="form-control" required="" rows="2" placeholder="Building name, Street & Floor Number or website url" name="address" maxlength="500">{{ old('address') ? old('address') : $event->address }}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="caption">Caption/Brief </label>
                    @error('caption')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <textarea class="form-control" rows="2" placeholder="Caption" name="caption" maxlength="500">{{ old('caption') ? old('caption') : $event->caption }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description <b style="color: red">*</b></label>
                @error('description')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
                <textarea  class="form-control" rows="2" placeholder="" name="description" id="description">{{ old('description') ? old('description') : $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="instructions">Instructions <b style="color: red">*</b></label>
                @error('instructions')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
                <textarea  class="form-control" rows="2" placeholder="" name="instructions" id="instructions" maxlength="1000">{{ old('instructions') ? old('instructions') : $event->instructions }}</textarea>
            </div>
            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="location">Location <b style="color: red">*</b></label>
                    <select path="location" id="country" name="location" class="custom-select">
                        <option value="-1">Online</option>
                        @foreach(\App\Location::all() as $c)
                        
                        <option value="{{ $c->id }}" @if(old('location') && (old('location')==$c->id || $event->location_id == $c->id))
                            selected=""
                            @endif
                            >{{ $c->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="industry">Industry <b style="color: red">*</b></label>

                    <select path="industry" id="industry" name="industry" class="custom-select">
                        <option value="-1">All Industries</option>
                        @foreach(\App\Industry::all() as $c)
                        
                        <option value="{{ $c->id }}" @if(old('industry') && (old('industry')==$c->id) || $event->industry_id == $c->id)
                            selected=""
                            @endif
                            >{{ $c->name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="form-group col-md-6">
                    @error('image')
                    <p class="text-danger"> <b style="color: red">*</b> Image uploaded is more than 5MB <b style="color: red">*</b></p>
                    @enderror
                    @if($event->image)
                    <div class="form-group mb-3">
                        <img src="{{ asset($event->imageUrl) }}" style="width: 100%">
                        <label for="image">Update Image (.png, .jpg or .jpeg) <small>(Max 5MB)</small></label>
                        <input type="file" path="image" name="image" id="image" accept=".png, .jpg,.jpeg" />
                    </div>

                    @else
                    <div class="form-group mb-3">
                        <label for="image">Attach Image (.png, .jpg or .jpeg) <small>(Max 5MB)</small> <b style="color: red">*</b></label>
                        <input type="file" required="" path="image" name="image" id="image" accept=".png, .jpg,.jpeg" />
                    </div>
                    @endif
                </div>
                <div class="form-group col-md-6" style="display: none">
                    <div class="form-check">
                        @if(old('public') && (old('public') == 'true') || $event->public == 'true')
                        <input class="form-check-input" type="checkbox" value="" id="public" checked="">
                        @else
                        <input class="form-check-input" type="checkbox" value="" id="public">
                        @endif
                        <label class="form-check-label" for="public">
                            Event is Public
                        </label>
                    </div>
                </div>


            </div>

            <div class="form-group row">
                <div class="form-group col-md-6">
                    @error('start_time')
                    <p class="text-danger"> <b style="color: red">*</b> Invalid Event Start Time <b style="color: red">*</b></p>
                    @enderror
                    <div class="form-group mb-3">
                        <label for="image">Start time <b style="color: red">*</b></label>
                        <input type="datetime-local" name="start_time" required="" class="form-control" value="{{ \Carbon\Carbon::parse($event->start_time)->format('Y-m-d\TH:i') }}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    @error('end_time')
                    <p class="text-danger"> <b style="color: red">*</b> Invalid Event End Time <b style="color: red">*</b></p>
                    @enderror
                    <div class="form-group mb-3">
                        <label for="image">End time <b style="color: red">*</b></label>
                        <input type="datetime-local" name="end_time" required="" class="form-control" value="{{ \Carbon\Carbon::parse($event->end_time)->format('Y-m-d\TH:i') }}">
                    </div>
                </div>


            </div>

            
            

            

            
        </div>
    </div>

    <div class="text-center">
        <button type="submit" name="button" class="btn btn-orange-alt">Update Event</button>
    </div>
</form>

<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {
        CKEDITOR.replace('description');
        CKEDITOR.replace('instructions');
    }, 3000);
</script>

@include('components.ads.responsive')


@endsection