@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Create Invoice')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Invoice')

<div class="card">
    <div class="card-body">
        <form method="POST" action="/admin/invoices/" id="create-invoice">
            @csrf
            <div class="row">
                <div class="col-md-12 row">
                    <div class="col-md-6">
                        <label><a href="/admin/invoices"><i class="fa fa-arrow-left"></i></a> First Name *</label>
                        <input type="text" name="first_name" maxlength="50" required="" class="form-control" id="title">
                    </div>
                    <div class="col-md-6">
                        <label>Last Name</label>
                        <input type="text" name="last_name" maxlength="50" class="form-control" id="title">
                    </div>

                    <div class="col-md-6">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" maxlength="50" class="form-control" id="title">
                    </div>
                    <div class="col-md-6">
                        <label>Email Address *</label>
                        <input type="email" name="email" maxlength="50" required="" class="form-control" id="title">
                    </div>
                    <div class="col-md-10 offset-md-1">
                        <label>Description *</label>
                        <textarea name="description" required="" maxlength="1000" class="form-control"></textarea>
                    </div>
                    <div class="col-md-10 offset-md-1">
                        <label>Amount * <small>Ksh</small></label>
                        <input type="number" name="sub_total" required="" class="form-control" id="title">
                    </div>
                    
                </div>
            </div>
            <div class="text-center">
                <br>
                <p>
                    <input type="submit" class="btn btn-orange" value="Send Invoice">
                </p>
            </div>
        </form>
        
    </div>
</div>

@endsection