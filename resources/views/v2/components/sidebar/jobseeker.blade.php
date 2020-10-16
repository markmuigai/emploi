@auth
<div class="profile-item">
    <img src="{{asset('assets-v2/img/dashboard1.jpg')}}" height="100px" alt="Dashboard">
    <h2>Tom Henry</h2>
    <span>Web Developer</span>
</div>
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="dashboard.html#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
        <i class='bx bx-user'></i>
        My Profile
    </a>
    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="dashboard.html#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
        <div class="profile-list">
            <i class='bx bxs-inbox'></i>
            Applied Jobs
        </div>
    </a>
    <a href="single-resume.html">
        <div class="profile-list">
            <i class='bx bx-note'></i>
            My Resume
        </div>
    </a>
    <a  href="login.html">
        <div class="profile-list">
            <i class='bx bx-log-out'></i>
            Logout
        </div>
    </a>
</div>
@endauth
@guest
@endguest