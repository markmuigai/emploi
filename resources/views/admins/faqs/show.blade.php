@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: FAQ Preview')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'FAQ Preview')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; ">
            <a href="/admin/faqs" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> All Faqs
            </a>
            
             <br><hr>
        </div>

        <div class="row">

            <div class="col">
                <br>
                <h3><b style="float: right;"> [{{ $faq->permission->role }}]</b>{{ $faq->title }}</h3>

                <p>
                    <?php echo $faq->description; ?>
                </p>
                <hr>
                <br>

                <p>
                    <strong>Created:</strong> {{ $faq->created_at->diffForHumans() }}

                    <a href="/admin/faqs/{{ $faq->id }}/edit" class="btn btn-link" style="float: right;">
                        <i class="fa fa-pen"></i> Edit
                    </a>
                    <form method="POST" action="/admin/faqs/{{ $faq->id }}" style="display: inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </p>
            </div>

        </div>
        
    </div>
</div>

@endsection