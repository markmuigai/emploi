@extends('layouts.sign')

@section('title','Emploi :: Create an Account')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

<?php  
$join_title = 'Create An Account';
if(isset($name))
{
    $nname = explode(" ", $name);
    $join_title = $nname[0].", select account type";
}
?>

@section('user_title', $join_title)

@section('content')



<div class="container text-center">
    <p>
        @if(!isset($name))

        
        <div class="sign-left ">
            <a href="https://emploi.co/auth-with/facebook" class="pr-2"><i class="fab fa-facebook-f"></i></a>
            <a href="https://emploi.co/auth-with/google" class="pr-2"><i class="fab fa-google"></i></a>
            <a href="https://emploi.co/auth-with/linkedin" class="pr-2"><i class="fab fa-linkedin"></i></a>
        </div>
        <br>
        Welcome to Emploi, an efficient platform to manage recruitments and find work for a successful career.
        @else
        Howdy {{ $name }}, welcome to Emploi. We've started creating your account, select whether you are an employer or job seeker.
        @endif
    </p>
    <div class="row acc-links">
       
        <a href="/register{{ isset($name) ? '?email='.$email.'&name='.$name : '' }}" class="col-md-6 col-12">
            <img src="/images/seeker-join.png" class="w-100 py-3" alt="Job Seeker Registration">
            <h4>Job Seeker Registration</h4>
        </a>
         <a href="/employers/register{{ isset($name) ? '?email='.$email.'&name='.$name : '' }}" class="col-md-6 col-12">
            <img src="/images/employer-join.png" class="w-100 py-3" alt="Employer Registration">
            <h4>Company Registration</h4>
        </a>
    </div>
    @if(!isset($name))
    <div class="text-center">
        <p>
            Already have an account? <br> <a href="/login" class="btn btn-orange">Log in here</a> or <a href="/contact" class="btn btn-orange-alt">Contact Us</a>
        </p>
    </div>
    @else
    <div class="text-center">
        <p>
            Need help registering? <br> <a href="/contact{{ isset($name) ? '?email='.$email.'&name='.$name : '' }}" class="btn btn-orange-alt">Contact Us</a>
        </p>
    </div>
    @endif
</div>

@endsection
