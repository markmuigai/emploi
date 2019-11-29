@extends('layouts.dashboard-layout')

@section('title','Emploi :: Edit Employer Profile')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit Profile')
<div class="card">
	<div class="card-body p-5">

		<form method="post" action="/profile/update"  enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>
					Full Name: *
					@error('name')
                        <strong class="pull-right" style="color: red"> * Invalid Name *</strong>
                    @enderror
				</label>
				<input type="text" name="name" class="form-control" value="{{ $user->name }}" required="" maxlength="50">
			</div>

			<div class="form-group">
				<label>E-mail Address: *</label>
				<input type="email" disabled="" class="form-control" value="{{ $user->email }}" required="">
			</div>

			<div class="form-group">
				<label>
					Username: *
					@error('username')
                        <strong class="pull-right" style="color: red"> * Username was invalid *</strong>
                    @enderror
				</label>
				<input type="text" name="username" class="form-control" value="{{ $user->username }}" required="" maxlength="20">
			</div>

			<div class="form-group">
				<label>
					Change Avatar: (png, jpg and jpeg Max 5MB)
					@error('avatar')
                        <strong class="pull-right" style="color: red"> * Uploaded avatar was invalid *</strong>
                    @enderror
				</label>
				<br>
				<input type="file" name="avatar" class="" accept=".png,.jpg,.jpeg" />
			</div>

			<button type="submit" name="button" class="btn btn-orange">Update Profile</button>
		</form>

	</div>
</div>

@endsection