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
                        <a href="#" class="btn btn-green px-3" data-toggle="dropdown">Documentation<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="index">Index</a></li>
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


<p>

<!-- 
Contents
Introduction    3
Requirements    3
System  4
Models  4
Views   4
Controllers 4
Middleware’s    4
Routes  4
Storage 4
System Emails   4
Installation    5
User types  5
Maintenance 6
 -->

<h3>Introduction</h3>

<p>This documentation explains the Emploi platforms structure, installation and maintenance. The platform was created with PHP Laravel Framework v6.6.2 following commonly used standards.
The system was built by Brian Obare and Latasha Wanjiru.</p>

<h3>Requirements</h3>
Ubuntu 18.04 <br>
<pP>For development and production server. Alternative linux distros can be used but Ubuntu 18.04 has been tested and Emploi is stable when run on ubuntu.
<br>PHP 7.4
<p>Latest version of PHP is required. At the time of writing, PHP 7.4 is the latest PHP Version released. The system minimum requirement PHP 7.2.
<br>MySQL 5.7
<p>Database to be used is MySQL Server whose latest version at the time of this writing is 5.7. Alternative databases can be used but performance and stability may vary.</p>
Composer<br>
Laravel uses Composer to manage package dependencies and as such the latest version of composer is required.
<br>Supervisor<br>
Supervisor manages queues, allowing us to queue emails for later sending. Latest version of supervisor is required. 
<br>GIT<br>
Version control used is GIT and the latest version should be installed on your system for Emploi to function.
<br>Certbot<br>
Certbot by Lets Encrypt is the SSL provider that Emploi uses to secure communication. 
<br>Nginx Server<br>
Nginx server is recommended as the LEMP stack is a high performance stack. 


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

    </div>

  <!--   <div class="card">
    <div class="card-body">
        <div class="text-right">
            <a href="/routesdoc" class="btn btn-sm btn-orange pull-right">Routes Documentation</a>
        </div>

</div> -->

@endsection