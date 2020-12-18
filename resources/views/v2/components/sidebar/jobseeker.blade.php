<?php
 $user=Auth::user();
 ?>
@if(isset($user) && $user->role == 'seeker')
<div class="profile-item">
     <img src="{{ $user->avatar ? '/storage/avatars/'.$user->avatar : '/images/avatar.png' }}" class="circle-img w-50 h-50" alt="{{ $user->name }}">
    <h2>{{ $user->getName() }}</h2>
    <span></span>
</div>
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link active" id="v-pills-home-tab"  href="/profile"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            <i class='bx bx-user'></i>
            My Profile
        </div>
    </a>
    <a class="nav-link" id="v-pills-messages-tab"  href="/profile/applications"  aria-controls="v-pills-messages" aria-selected="false">
        <div class="profile-list">
            <i class='bx bxs-inbox'></i>
            Applications
        </div>
    </a>
<!--     <a href="/storage/resumes/{{ $user->seeker->resume }}">
        <div class="profile-list">
            <i class='bx bx-note'></i>
            My Resume
        </div>
    </a> -->
    <a class="nav-link" href="self-assessment?email={{ $user->email }}">
        <div class="profile-list">
            <i class='bx bx-envelope'></i>
           My Assessment Result
        </div>
    </a>
     <a class="nav-link" href="/logout">
        <div class="profile-list">
            <i class='bx bx-log-out'></i>
            Logout
        </div>
    </a>
</div>
@endif
@if (auth()->user() && auth()->user()->role != 'seeker')
<div class="profile-item">
     <img src="{{ $user->avatar ? '/storage/avatars/'.$user->avatar : '/images/avatar.png' }}" class="circle-img w-50 h-50" alt="{{ $user->name }}">
    <h2>{{ $user->getName() }}</h2>
    <span></span>
</div>
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link active" id="v-pills-home-tab"  href="/profile"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            <i class='bx bx-user'></i>
            My Profile
        </div>
    </a>
</div>

<!--     advertise here -->
<br><a href="/advertise/create">
    <div class="card">
        <div class="card-header" style="background-color:#554695; color:white;">
            Advertise Here
        </div>              
    </div>
    <div class="d-flex justify-content-center banner shadow-lg animate__animated animate__swing animate__infinite infinite animate__slower 20s mt-4">
        <h5>Hire on Emploi</h5>
    </div>
</a>
<!--    end advertise here     -->     
@endif  

{{-- @include('components.ads.vertical_responsive') --}}
