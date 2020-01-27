@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Faq')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Faq')

<div class="card">
    <div class="card-body">
        <h2>
            <a href="/admin/faqs" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>
            New Frequently Asked Question            
        </h2>
        <br>
        <form method="post" action="/admin/faqs">
            @csrf

            <div class="form-group">
                <label>
                    Title:
                </label>
                <input type="text" name="title" placeholder="" value="" required="required" class="form-control" maxlength="500">
            </div>

            <div class="form-group">
                <label>
                    Description:
                </label>
                <textarea name="description" class="form-control" required="" id="description"></textarea>
            </div>

            <div class="form-group">
                <label>
                    Role:
                </label>
                <select name="permission" class="form-control">
                    @forelse($permissions as $perm)
                    <option value="{{ $perm->id }}">{{ $perm->role }}</option>
                    @empty
                    @endforelse
                </select>
            </div>

            

            
            <button type="submit" name="button" class="btn btn-orange">Create Faq</button>
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
