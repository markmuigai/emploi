@extends('layouts.dashboard-layout')

@section('title','Emploi :: Edit Employer Profile')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit Profile')
<div class="card">
	<div class="card-body p-5">

		<form method="post" action="/profile/update" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>Full Name: *</label>
				<input type="text" name="name" class="form-control" value="{{ $user->name }}" required="">
			</div>

			<div class="form-group">
				<label>E-mail Address: *</label>
				<input type="email" disabled="" class="form-control" value="{{ $user->email }}" required="">
			</div>

			<div class="form-group">
				<label>Username: *</label>
				<input type="text" name="username" class="form-control" value="{{ $user->username }}" required="">
			</div>

			<div class="form-group">
				<div class="custom-file">
					<input type="file" name="avatar" class="custom-file-input" value="" accept="image/png, image/jpeg" />
					<label class="custom-file-label" for="avatar">Choose Avatar</label>
				</div>
			</div>

			<button type="submit" name="button" class="btn btn-orange">Update Profile</button>
		</form>

	</div>
</div>

@endsection