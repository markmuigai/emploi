@extends('layouts.dashboard-layout')

@section('title','Emploi :: Super Admin')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Documentation')
<div class="card">
    <div class="card-body">
        <div class="dropdown">
            <a href="#" class="btn btn-green px-3" data-toggle="dropdown">Documentation    <strong class="caret"></strong></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Index</a></li>
                    <li><a href="routes">Routes</a></li>
                    <li><a href="controllers">Controllers</a></li>
                    <li><a href="views" >Views</a></li>
                    <li><a href="rsi" >RSI</a></li>
                </ul>
        </div>

                <div class="text-right">
                  <h2>EMPLOI DOCUMENTATION</h2>
                  <p>By Obare C. Brian and David Kirarit</p>

                </div>


<h3>Introduction</h3>

<p>This documentation explains the Emploi platforms structure, installation and maintenance. The platform was created with PHP Laravel Framework v6.6.2 following commonly used standards.
The system was built by Brian Obare and Latasha Wanjiru.</p>

<h3>Requirements</h3>
Ubuntu 18.04 <br>
<p>For development and production server. Alternative linux distros can be used but Ubuntu 18.04 has been tested and Emploi is stable when run on ubuntu.</p>
<br>PHP 7.4
<p>Latest version of PHP is required. At the time of writing, PHP 7.4 is the latest PHP Version released. The system minimum requirement PHP 7.2.
<br>MySQL 5.7
<p>Database to be used is MySQL Server whose latest version at the time of this writing is 5.7. Alternative databases can be used but performance and stability may vary.
Composer<br>
Laravel uses Composer to manage package dependencies and as such the latest version of composer is required.
<br>Supervisor<br>
Supervisor manages queues, allowing us to queue emails for later sending. Latest version of supervisor is required. 
<br>GIT<br>
Version control used is GIT and the latest version should be installed on your system for Emploi to function.
<br>Certbot<br>
Certbot by Lets Encrypt is the SSL provider that Emploi uses to secure communication. 
<br>Nginx Server<br>
Nginx server is recommended as the LEMP stack is a high performance stack. </p>


<h3>System</h3>
Emploi has been created using the PHP Laravel Framework following Model-View-Controller (MVC) technique. 

<h3>Models</h3>
Models define the logic of every bit of the application. Models are located in the app directory within the main folder structure.  

<h3>Views</h3>
Views are what the users of Emploi see when using the platform. Views include web pages and emails and are located inside the views folder found in the resources directory.  
Master views, which determine how the site looks are found in resources/views/layouts.

<h3>Controllers</h3>
Controllers contain the logic of the application, and are found in the app/Http/Controllers directory.

<h3>Middleware’s</h3>
Middleware’s control access to the platform and are found in app/Http/Middlewares directory. 

<h3>Routes</h3>
The routes files are located in the routes directory within the main folder. The web.php file contains the web routes which can be accessed by users of the platform. 

<h3>Storage</h3>
Storage provides a means of storing files on the machine which the system is running to exclude them from GIT.
After installation, the system administrator is expected to create a link between the public and storage folders then create the structure below to enable saving files.
storage/app/public/blogs
storage/app/public/resumes
storage/app/public/companies
storage/app/public/images
storage/app/public/avatars

<h3>System Emails</h3>
<p>The system uses mailgun API to sent emails.</p>

<h3>Installation</h3>
Installation instructions have been included in the readme.md file located in the folder root.

<h3>User types</h3>
Emploi supports 5 user types as shown below:<br>
    1. Super Administrators – Manage administrators on the platform. By default, one super admin is created when seeding data with the username admin.<br>
    2. Administrators – Administrators are responsible for coordinating activities on the platform. By default, one admin is created during seeding with the username info. Super admin can create more administrators.<br>
    3. Employers – Employers are users who post jobs and conduct recruitment on the platform. By default, an employer with the username jobs is created while seeding. Other employers can register or have their data imported from cv-portal.<br>
    4. Job Seekers – These are individuals who are seeking work on the platform. They can register or have their profiles imported from cv-portal.<br>
    5. Referees – Jobseekers add referees to their profile who provide insight into them. Referees submit assessment of the job seeker which is used by the RSI scoring algorithm.</p>
Important Folders</br>
Important Files</br>


<h3>Maintenance</h3>

<p>This involves all procedures that have to be undertaken to keep the platform running optimally, adding and removing features as well as trouble shooting.</p>
    1. SSL Certificate-
The SSL certificate has been approved for 90 days, and has to be renewed for free once this period has lapsed. 
Renewal command is: certbot renew<br>
    2. Email service-
Emploi email hosting for users have been setup with Truehost and require annual renewal to keep them functional. This can be done from the provider’s website www.truehost.co.ke<br>

</p><br>
<h3>Custom Commands</h3>
<p>In addition to the commands provided with Artisan, the system is also has custom commands stored in the app/Console/Commands directory.These command include;</p>
<ul>
    <li>cleanResumes-Deletes all resumes that are not mentioned on job seekers table.</li>
    <li>disableProducts-Disables products which have expired.</li>
    <li>enableProducts-Enables products which have not been activated.</li>
    <li>FindMissingUsers-Finds users who were left out when moving from cv-portal</li>
    <li>FixMissingSeekers-Creates users who were left out by first import</li>
    <li>FixRegistrationDate-Fixes the registration date of users who were imported on the platform</li>
    <li>ImportData-imports data from cv-portal</li>
    <li>ImportPosts-imports data from career resources database</li>
    <li>SplitPosts-Splits  posts table that have how to apply mentioned in responsibilities</li>
    <li>TestCron-Tests whether crontab is working correctly</li>
    <li>VerificationEmailsResend-Sends verification emails to job seekers whos verification emails experienced error registering</li>
</ul>

<h3>Invite Friends</h3>
<p>The systems allows for a registered user to invite his/her friends. The user is required to click on a 'user plus' icon located at the bottom right corner. Once an invited friend registers, the invitee is awarded 10 points for every job seeker and 20 points for employer sign up.Redeem referrals can be redeemed on Emploi credits or airtime. Credits are only available to registered users.</p>

<h3>Countries</h3>
<p>Any admin can create a new country through the countries link in the admin dashboard. A new country should have a name,phone prefix, code and currency. Once a country has been created, it can be edited by clicking view on that specific country.</p>

<h3>Products</h3>
<div class="container">
    <div class="row">
        <div class="col-md-2"><h5>Slug</h5>
          <h6>1</h6><br>
          <h6>2</h6>
          <h6>3</h6><br>
        </div>
        <div class="col-md-3"><h5>Product Name</h5>
         <h6>Career Change or Promotion Seeking CV </h6>
         <h6>Featured Job Seeker</h6>
         <h6>Infinity Advertising Package</h6>
        </div>
          
        <div class="col-md-7"><h5>Description</h5>
          <p>Top of the list search, Professional CV editing, Exclusive Placement Services, Interview coaching, Shortlisting Notifications</p>
          <p>Top of the list search, Shortlisting Notifications</p>
          <p>Advertise many jobs on Emploi for 30 days.</p>
          <p></p>
        </div>
        
    </div>
</div>

<!-- <p><b>Career Change or Promotion Seeking CV</b>-
  Top of the list search, Professional CV editing, Exclusive Placement Services, Interview coaching, Shortlisting Notifications Price: Ksh 4000 for 365 days</p>

  <p><b>Featured Job Seeker</b>-
Top of the list search, Shortlisting Notifications
Price: Ksh 159 for 30 days</p>

<p><b>Infinity Advertising Package</b>-
Advertise many jobs on Emploi for 30 days.
Price: Ksh 9025 for 30 days</p>

<p><b>Job Seeker Basic Package</b>-
Get notifications when shortlisted by an employer
Price: Ksh 49 for 30 days</p>

<p><b>Management Level Professional CV Editing</b>-
Top of the list search, Professional CV editing, Exclusive Placement Services, Interview coaching, Shortlisting Notifications
Price: Ksh 6000 for 365 days</p>

<p><b>Premium Entry Level Job Seeker</b>-
Top of the list search, Professional CV editing, Exclusive Placement Services, Interview coaching, Shortlisting Notifications
Price: Ksh 2000 for 366 days</p>

<p><b>Premium Mid Level Job Seeker</b>-
Top of the list search, Professional CV editing, Exclusive Placement Services, Interview coaching, Shortlisting Notifications
Price: Ksh 4000 for 365 days</p>

<p><b>Senior Management Level CV Editing</b>-
Top of the list search, Professional CV editing, Exclusive Placement Services, Interview coaching, Shortlisting Notifications
Price: Ksh 10000 for 365 days</p>

<p><b>Solo Advertising Package</b>-
Advertise your vacancy on Emploi
Price: Ksh 2500 for 30 days</p>

<p><b>Solo Plus Advertising Package</b>-
Advertise 2-4 jobs on Emploi
Price: Ksh 4750 for 30 days</p>
</p> -->

<h3>Invoice</h3>
<p>An invoice is created by admin for every product ordered.</p>

<h3>Bloggers</h3>
<p>Bloggers are the people who post blogs in the system. Currently there are four active bloggers</p>
<p>Bloggers can be created by tapping on the blogger link in the admin dashboard</p>

<h3>Emailer</h3>
<p>To send a message, the system use the 'to' method on the Mail facade. The to method accepts an email addresses of certain target group of a certain category. If you pass an object or collection of objects, the mailer will automatically use their email and name properties when setting the email recipients.</p>

<h3>CV Request</h3>
<p>A registered employer can request a CV of a particular job seeker.</p>

<h3>CV Editing</h3>
<p>A job seeker can request for CV Editing services offered at a cost. The CVs are edited by registered CV Editors</p>


<h3>Errors</h3>
<div class="container">
    <div class="row">
        <div class="col-md-3"><h5>Error</h5>
         <ul>
             <li>401</li><br>
             <li>403</li><br><br><br>
             <li>404</li><br>
             <li>419</li>
             <li>429</li><br>
             <li>500</li><br><br><br>
             <li>503</li>
         </ul>
         </div>
        <div class="col-md-9"><h5>Description</h5>
        <ul>
            <li>This error indicates that the requested file requires authentication (a username and password).</li>
            <li>This error indicates that the server will not allow the visitor to access the requested file. If a visitor receives this code unexpectedly, you should check the file's permission settings, or check whether the file has been protected.</li>
            <li>This error indicates that the server could not find the file that the visitor requested. This commonly occurs when a URL is mistyped.</li>
            <li>Indicates that previously valid authentication has expired. </li>
            <li>Indicates the user has sent too many requests in a given amount of time.</li>
            <li>This error indicates that the server has encountered an unexpected condition. This often occurs when an application request cannot be fulfilled due to the application being configured incorrectly on the server.</li>
            <li>This error occurs when the server is unable to handle requests due to a temporary overload or due to the server being temporarily closed for maintenance. The error indicates that the server will only temporarily be down.</li>
        </ul>
        </div>
    </div>
</div>
    </div>
</div>

@endsection