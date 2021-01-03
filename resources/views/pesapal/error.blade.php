@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$title)

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
@section('page_title', $title)

<div class="card">
    <div class="card-body text-center">
        <h4>Checkout Failed</h4>
        <p>
            <?php echo $message; ?>
        </p>
        <p>
            Kindly <a class="orange" href="/contact">contact us</a> if this error persists.
        </p>
    </div>
</div>



@endsection