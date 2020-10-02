@extends('layouts.dashboard-layout')

@section('title','Emploi :: Edit Faq')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit Faq')

<div class="card">
    <div class="card-body">
        <h2>
            <a href="#" class="btn btn-sm btn-default" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> Back</a>
            Edit Frequently Asked Question            
        </h2>
        <br>
        <form method="post" action="/admin/faqs/{{ $faq->id }}">
            @csrf
            {{method_field('PUT')}}

            <div class="form-group">
                <label>
                    Title:
                </label>
                <input type="text" name="title" placeholder="" value="{{ $faq->title }}" required="required" class="form-control" maxlength="500">
            </div>

            <div class="form-group">
                <label>
                    Description:
                </label>
                <textarea name="description" class="form-control" required="" id="description">{{ $faq->description }}</textarea>
            </div>

            <div class="form-group">
                <label>
                    Role:
                </label>
                <select name="permission" class="form-control">
                    @forelse($permissions as $perm)
                    <option value="{{ $perm->id }}" {{ $faq->permission->id==$perm->id ? 'selected=""' : '' }}>{{ $perm->role }}</option>
                    @empty
                    @endforelse
                </select>
            </div>

            

            
            <button type="submit" name="button" class="btn btn-orange">Edit Faq</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {
        CKEDITOR.replace('description');
    }, 3000);
</script>

@endsection
