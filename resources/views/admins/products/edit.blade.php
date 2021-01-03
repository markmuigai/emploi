@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Edit '.$product->title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit '.$product->title)

<div class="card">
    <div class="card-body">
        <form method="POST" action="/admin/products/{{ $product->slug }}" id="create-product">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <label><a href="/admin/products"><i class="fa fa-arrow-left"></i></a> Title</label>
                        <input type="text" name="title" maxlength="500" required="" class="form-control" id="title" maxlength="100" value="{{ $product->title }}">
                    </div>
                    <div>
                        <label>Tagline</label>
                        <textarea class="form-control" required="" name="tagline" maxlength="500">{{ $product->tagline }}</textarea>
                    </div>
                    <div>
                        <br>
                        <label>Description</label>
                        <textarea class="form-control" id="description" required="" name="description"><?php echo $product->description; ?></textarea>
                    </div>
                    <div>
                        <label>Price (Ksh)</label>
                        <input type="number" min="1" name="price" required="" class="form-control" value="{{ $product->price }}">
                    </div>

                    <div>
                        <label>Valid for <small>(days)</small></label>
                        <input type="number" min="1" name="days_duration" required="" value="{{ $product->days_duration }}" class="form-control">
                    </div>

                    
                </div>
            </div>
            <div class="text-center">
                <br>
                <p>
                    <a href="#" class="btn btn-orange" id="save-product">Update</a>
                </p>
            </div>
        </form>
        
    </div>
</div>

<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {
        CKEDITOR.replace('description');

    }, 3000);
    
    $().ready(function(){
        $('#save-product').click(function(){
            var title = $('#title').val();
            if (title.length < 5)
                return notify('Product Title is too short', 'error');

            var desc = CKEDITOR.instances['description'].getData().replace(/<[^>]*>/gi, '').length;
            if(desc < 10)
                return notify('Invalid product description provided', 'error');

            $('#create-product').submit();
        });
    });
</script>

@endsection