@extends('v2.layouts.app')

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
	<!-- End Navbar -->
	
	<!-- Dashboard -->
        <!-- Dashboard -->
        <div class="dashboard-area ptb-100 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="profile-item">
                             <img src="{{ $user->avatar ? '/storage/avatars/'.$user->avatar : '/images/avatar.png' }}" class="img-responsive w-100" alt="My Avatar" />
                            <h2>{{ $user->getName() }}</h2>
                            {{ $user->seeker->current_position }}
                            {{ $user->email }}
                            {{ $user->seeker->phone_number }}
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="dashboard.html#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <i class='bx bx-user'></i>
                                My Profile
                            </a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="dashboard.html#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                <div class="profile-list">                               
                                    <i class='bx bxs-inbox'></i>
                                    <a href="profile/applications">
                                    Applied Jobs
                                </a>
                                </div>
                            </a>
                            <a href="#">
                                <div class="profile-list">
                                    <i class='bx bx-note'></i>
                                    My Resume
                                </div>
                            </a>
                            <a href="/v2/vacancies">
                                <div class="profile-list">
                                    <i class='bx bx-task'></i>
                                    Vacancies
                                </div>
                            </a>
                            <a href="profile/referees">
                                <div class="profile-list">
                                    <i class='bx bx-user'></i>
                                    Referees
                                </div>
                            </a>
                            <a  href="/logout">
                                <div class="profile-list">
                                    <i class='bx bx-log-out'></i>
                                    Logout
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="profile-content">
                                        <div class="profile-content-inner">
                                            <h2>Edit Personal Details</h2>
                                          
                                            <!-- EDIT PERSONAL DETAILS -->

										<form method="POST" action="update" enctype="multipart/form-data" id="update-form">
										    @csrf
                
										    <div class="edit-section" id="section1">
										        <div class="card">
										            <div class="card-body p-5">
										                @error('resume')
										                    <p class="text-danger">Resume errors were detected</p>
										                @enderror
										                @error('avatar')
										                    <p class="text-danger">Avatar errors were detected</p>
										                @enderror
										                <div class="row mb-2 text-center about-icons">
										                    <div class="col-md-4 col-6 my-3">
												                <div class="form-group">
												                    <label for="fullName">Full Name  <b style="color: red" title="Required">*</b></label>
												                    <input type="text" required="" path="fullName" name="name" id="fullName" class="form-control input-sm" maxlength="50" value="{{ $user->name }}" />
												                </div>
										                    </div>
												            <div class="col-md-4 col-6 my-3">
												                <div class="form-group">
												                    <label for="public_name">Public Name  <b style="color: red" title="Required">*</b></label>
												                    <input type="text" required="" value="{{ $user->seeker->public_name }}" name="public_name" id="public_name" class="form-control input-sm" maxlength="50" />
												                </div>
												            </div>
												            <div class="col-md-4 col-6 my-3">
												                <div class="form-group">
												                    <label for="username">Username  <b style="color: red" title="Required">*</b></label>
												                    <input type="text" required="" value="{{ $user->username }}" name="username" id="username" class="form-control input-sm" maxlength="50" />
												                </div>
												            </div>
												            <div class="col-md-4 col-6 my-3">
												                <div class="form-group">
												                    <label for="phone_number">Phone Number  <b style="color: red" title="Required">*</b></label>
												                    <input type="number" required="" path="phone_number" value="{{ $user->seeker->phone_number }}" name="phone_number" id="phone_number" class="form-control input-sm" placeholder="254712312313"
												                      oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" />
												                </div>
												            </div>
												            <div class="col-md-4 col-6 my-3">
												                <div class="form-group">
												                    <label for="sex">Gender</label>
												                    <div class="radios">
												                        @foreach(["M" => 'Male','F'=>'Female','I'=>'Other'] as $key => $value)
												                        <label for="radio-01" class="label_radio">
												                            <input type="radio" name="gender" value="{{ $key }}" <?php
												                            if($user->seeker->gender == $key)
												                                    {
												                                        echo "checked=''";
												                                    }
												                                    ?>> {{ $value }}
												                        </label>
												                        @endforeach
												                    </div>
												                </div>
												            </div>
												            <div class="col-md-4 col-6 my-3">
												                <div class="form-group">
												                    <label for="email">Email  <b style="color: red" title="Required">*</b></label>
												                    <input type="email" required="" value="{{ $user->email }}" disabled="" path="email" id="email" class="form-control input-sm" maxlength="50" />
												                </div>
												            </div>

												            <div class="col-md-4 col-6 my-3">
												                <div class="form-group">
												                    <label for="country">Country  <b style="color: red" title="Required">*</b></label>
												                    <select path="country" id="country" name="country" class="form-control input-sm">
												                        @foreach($countries as $c)
												                        <option value="{{ $c->id }}" @if($c->id == $user->seeker->country_id)
												                            selected=""
												                            @endif
												                            >{{ $c->name }}</option>
												                        @endforeach
												                    </select>
												                </div>
												            </div>

												            <div class="col-md-4 col-6 my-3">
												                <div class="form-group">
												                    <label for="location">Location</label>
												                    <select name="location" id="location" class="form-control input-sm">
												                        @foreach($locations as $c)
												                        <option value="{{ $c->id }}" @if($c->id == $user->seeker->location_id)
												                            selected=""
												                            @endif
												                            >{{ $c->country->code }} {{ $c->name }}</option>
												                        @endforeach
												                    </select>
												                </div>
												            </div>
												            <div class="col-md-4 col-6 my-3">
												                <div class="form-group">
												                    <label for="date_of_birth">Date of Birth  <b style="color: red" title="Required">*</b></label>
												                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $user->seeker->date_of_birth }}">
												                </div>
												            </div>

												            <div class="col-md-4 col-6 my-3">
												                <div class="form-group">
												                    <label for="post_address">Address  <b style="color: red" title="Required">*</b></label>
												                    <textarea class="form-control" name="post_address" id="address" rows="2">{{ $user->seeker->post_address }}</textarea>
												                </div>
												            </div>

												            <div class="col-md-4 col-6 my-3">
												                <div class="form-group">
												                    <label for="avatar">Update Profile Photo(.png, .jpg or .jpeg) <small>(Max 5MB)</small></label>
												                    @error('avatar')
												                        <p class="text-danger"> * Uploaded avatar was invalid *</p>
												                    @enderror
												                    <input type="file" name="avatar" value="" accept=".jpg, .png,.jpeg" />
												                </div>
												            </div>
												        </div>
														<div class="form-group">
															<label for="objective">Career Objective</label>
															    <textarea rows="2" class="form-control" name="objective" placeholder="Briefly introduce yourself to employers, highlighting your strengths and skills">{{ $user->seeker->objective }}</textarea>
														</div>
														<div class="d-flex justify-content-between">
										             <!--          <a href="#" class="toSection2 btn btn-purple">< Cancel </a> -->
										                     
										                <input type="submit" value="Update" class="btn btn-orange">
										                </div>
										            </div>
										        </div>
										    </div>
										</form>
                                            <!-- END OF EDIT PERSONAL DETAILS -->
                                        </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
                  </div>
            </div>
        </div>
        <!-- End Dashboard -->
	<!-- End Dashboard -->
<script type="text/javascript">
    <?php
    $loc = '';
    foreach($locations as $c) {
        $loc .= "[".$c->id.", '".$c->name."', ".$c->country_id."],";
    }
    $loc = '['.$loc.']';
    echo 'var allLocations='.$loc.
    ';';
    ?>
</script>

<script type="text/javascript">
    $().ready(function(){
        $('#country').change(function(){
            var new_ctry = $(this).val();
            
            var $locations = '';
            for(var j=0; j<allLocations.length;j++)
            {
                if(allLocations[j][2] == new_ctry)
                {
                    $locations +=  '<option value="'+allLocations[j][0]+'">'+allLocations[j][1]+'</option>';

                }
            }
            $('#location').children().remove();
            $('#location').append($locations);
                        
             notify('Country updated','info');          
         });
        $('#location').change(function(){
        var new_loc = $(this).val();
        if (new_loc == -1)
            return ($(this).attr('location_id') == new_loc);
                
        });
   });
</script>
@endsection