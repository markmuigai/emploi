@extends('layouts.dashboard-layout')

@section('title','Emploi :: Application Success')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $post->title)

 <script>
  $(document).ready(function(){
   setTimeout(function(){
       $('#CVEditingModal').modal('show');
   }, 6000);
  });
  
</script>

<div class="card">
    <div class="card-body text-center">
        <h4 style="color: green">Application Success!</h4>
        <p>
            Application for {{ $post->title }} was successful.
        </p>
         {{-- @include('components.ads.responsive') --}}
        <p>
            You will be notified on your application progress in due time. For further assistance, please do not hesitate to <a class="orange" href="/contact">contact us</a>.
        </p>           
       @include('components.otherJobs')

    </div>
</div>

<!--     cv editing modal -->
    @include('v2.components.modals.cv-editing-services')
<!--     end cv editing modal -->


@endsection