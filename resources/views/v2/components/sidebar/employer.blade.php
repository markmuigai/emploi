<?php
 $user=Auth::user();
 ?>
@if(isset($user) && $user->role == 'employer')
<div class="nav flex-column nav-pills border rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link" id="v-pills-home-tab"  href="/profile"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            My Profile
        </div>
    </a>
    <a class="nav-link {{request()->is('employers/jobs/*') || request()->is('v2/jobs/*') ||  request()->is('v2/employers/*') ? 'active' : ''}}" id="v-pills-home-tab"  href="/employers/jobs"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            Jobs
        </div>
    </a>
    <a class="nav-link {{ request()->routeIs('v2.seekers*') ? 'active' : '' }}" id="v-pills-home-tab"  href="{{route('v2.seekers.index')}}"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            Browse Candidates
        </div>
    </a>
    <a class="nav-link" id="v-pills-home-tab"  href="/employers/saved"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            Saved Profiles
        </div>
    </a>
    <a class="nav-link" id="v-pills-home-tab"  href="/employers/paas-dash"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            Management Dashboard
        </div>
    </a>
    <a class="nav-link" id="v-pills-home-tab"  href="/employers/cv-requests"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            Requested Profiles
        </div>
    </a>
</div>
@endif
{{-- @include('components.ads.vertical_responsive') --}}
