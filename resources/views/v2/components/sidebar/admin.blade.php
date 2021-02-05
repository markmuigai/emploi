<?php
 $user=Auth::user();
 ?>
@if(isset($user) && $user->role == 'admin')
<div class="nav flex-column nav-pills border rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link" id="v-pills-home-tab"  href="/admin/panel"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            Dashboard
        </div>
    </a>
    <a class="nav-link" id="v-pills-home-tab"  href="/admin/posts"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            Job Posts
        </div>
    </a>
    <a class="nav-link" id="v-pills-home-tab"  href="/admin/username/jobs"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            Emploi Profile
        </div>
    </a>
    <a class="nav-link" id="v-pills-home-tab"  href="/admin/blog"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            Blogs
        </div>
    </a>
    <a class="nav-link" id="v-pills-home-tab"  href="/admin/emails"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            Send Emails
        </div>
    </a>
    <a class="nav-link" id="v-pills-home-tab"  href="/admin/invoices"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            Invoices
        </div>
    </a>
    <a class="nav-link" id="v-pills-home-tab"  href="/admin/paas-applications"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            Paas Applications
        </div>
    </a>
    <a class="nav-link {{ request()->routeIs('assessment*') ? 'active' : '' }}" id="v-pills-home-tab"  href="{{route('assessmentResults.index')}}"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            Assessments
        </div>
    </a>
    <a class="nav-link {{ request()->routeIs('cvReviews*') ? 'active' : '' }}" id="v-pills-home-tab"  href="{{route('cvReviews.index')}}"  aria-controls="v-pills-home" aria-selected="true">
        <div class="profile-list">
            CV Reviews
        </div>
    </a>
</div>
@endif
{{-- @include('components.ads.vertical_responsive') --}}
