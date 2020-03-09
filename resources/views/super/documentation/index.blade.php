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
    <p>For development and production server. Alternative linux distros can be used but Ubuntu 18.04 has been tested and Emploi is stable when run on ubuntu.
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
    Nginx server is recommended as the LEMP stack is a high performance stack.</p> 


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
  <!--   Important Folders</br>
    Important Files</br> -->


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
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <b>Command</b>
            </div>
            <div class="col-md-3">
                <b>Usage</b>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                CleanResumes
            </div>
            <div class="col-md-9">
                <p>
                    Use when there exists resumes in /storage/app/public/resumes that are not linked to a job seekers profile in seeekers table, resume column.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
              DisableProducts  
            </div>
            <div class="col-md-9">
                <p>
                    Use to deactivate products that have expired.  
                </p>
            </div>
        </div>

        <div class="row">
            <div cldass="col-md-3">
              EnableProducts  
            </div>
            <div class="col-md-9">
                <p>
                    Used to activate products that have already been paid for.  
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
              FindMissingUsers 
            </div>
            <div class="col-md-9">
                <p>
                   Finds users who were left out from last import and store them in /app/fixregdate.csv.  
                </p>
            </div>
        </div>

           <div class="row">
            <div class="col-md-3">
              FixMissingSeekers 
            </div>
            <div class="col-md-9">
                <p>
                    Creates users who were left out by first import and store them in /app/missing-seekers.csv
                </p>
            </div>
        </div>


         <div class="row">
            <div class="col-md-3">
              FixRegistrationDate 
            </div>
            <div class="col-md-9">
                <p>
                    Fixes the registration date of users who were imported on the platform and store in /app/fixregdate.csv
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
              ImportData 
            </div>
            <div class="col-md-9">
                <p>
                    Imports data from cv-portal and store as a csv file.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
              ImportPosts 
            </div>
            <div class="col-md-9">
                <p>
                    Imports data from career resources database and store in /app/posts.csv
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
              SplitPosts 
            </div>
            <div class="col-md-9">
                <p>
                    Splits  posts table that have how to apply mentioned in responsibilities
                </p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
              TestCron 
            </div>
            <div class="col-md-9">
                <p>
                    Tests whether the commands are working correctly
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
              VerificationEmailsResend 
            </div>
            <div class="col-md-9">
                <p>
                   Sends verification emails to job seekers whos verification emails experienced error registering
                </p>
            </div>
        </div>
    </div>


<h3>Invite Friends</h3>
<p>This is made up of three modules; invite friend, invites CSV and rewards.</p>
<p>A registered user can invite his/her friends by clicking on a 'user plus' icon located at the bottom right corner. This requires name and email address.</p>
<p>For CSV invite, invitee is required to upload a csv contact file</p>
<p>Once an invited friend registers, the invitee is awarded 10 points for every job seeker and 20 points for employer sign up.Redeem referrals can be redeemed on Emploi credits or airtime. Credits are only available to registered users.</p>

<h3>Countries</h3>
<p>Any admin can create a new country through the countries link in the admin dashboard. A new country should have a name,phone prefix, code and currency. Once a country has been created, it can be edited by clicking view on that specific country.</p>




    <h3>Products</h3>

     <div class="container">
        <p>Products can be created by an admin. It should include title, tagline, description, price,days_duration and a unique slug generated dynamically.</p>
        <div class="row">
            <div class="col-md-3">
                <b>Product Name</b>
            </div>
            <div class="col-md-9">
                <b>Description</b>
            </div>
        </div>

         <div class="row">
            <div class="col-md-3">
                Career Change or Promotion Seeking CV
            </div>
            <div class="col-md-9">
                <p>This includes top of the list search, professional CV editing, exclusive placement services and interview coaching for 365 days</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
               Featured Company
            </div>
            <div class="col-md-9">
                <p>Rank company higher in job seeker searches, get featured on our vacancies e-mail banner for 30 days</p>
            </div>
        </div>

         <div class="row">
            <div class="col-md-3">
               Featured Job Seeker
            </div>
            <div class="col-md-9">
                <p>Includes top of the list search and shortlisting Notifications for 30 days</p>
            </div>
        </div>

           <div class="row">
            <div class="col-md-3">
               Infinity Advertising Package
            </div>
            <div class="col-md-9">
                <p>Allows for many jobs advertisements for 30 days.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
               Job Seeker Basic Package
            </div>
            <div class="col-md-9">
                <p>Get notifications when shortlisted by an employer</p>
            </div>
        </
        <div class="row">
            <div class="col-md-3">
               Management Level Professional CV Editing
            </div>
            <div class="col-md-9">
                <p>It include top of the list search, professional CV editing, exclusive placement services, interview coaching and shortlisting Notifications for 365 days</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
               Premium entry level job seeker
            </div>
            <div class="col-md-9">
                <p>This includes top of the list search, professional CV editing, exclusive placement pervices, interview coaching and shortlisting notifications</p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
              Premium mid level level job seeker
             </div>
            <div class="col-md-9">
                <p>Top of the list search, Professional CV editing, Exclusive Placement Services, Interview coaching and Shortlisting Notifications for 365 days</p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
                Senior Management Level CV Editing
            </div>
            <div class="col-md-9">
                <p>Top of the list search, Professional CV editing, Exclusive Placement Services, Interview coaching and Shortlisting Notifications for 365 days</p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
                Solo advertising package
            </div>
            <div class="col-md-9">
                <p>Allows for advertisement of only one vacancy on Emploi for 30 days</p>
            </div>
        </div>

          <div class="row">
            <div class="col-md-3">
               Solo Plus Advertising Package
            </div>
            <div class="col-md-9">
                <p>Allows for 2-4 jobs advertisement on Emploi</p>
            </div>
        </div>

            <div class="row">
            <div class="col-md-3">
               Stawi
            </div>
            <div class="col-md-9">
                <p>Allows and employer to post a vacancy and browse job seekers. This has to be approved by admin upon payment of required amount</p>
            </div>
        </div>
    </div>
   

    <h3>Invoice</h3>
    <p> An invoice is created for the product ordered. There are two types of invoices in this system, one is generated by the system after an order is made and the other is created by admin</p> 
    <p>Pesapal as the main mode of payment in the system is build with a good invoicing feature. Then later the payment can be made through options available on Pesapal, in this case Mobile Money is the most convenient and efficient mode.</p>
    <p>The admin can verify a payment by inputting transaction code.</p>

    <h3>Bloggers</h3>
    <p>Bloggers are the people who post blogs in the system. They should have registered and verified their accounts</p>
    <p>Bloggers can be created by tapping on the blogger link in the admin dashboard, enter the email address then status as active</p>
    <p>Blogs can be created by any active blogger and must be approved by an admin before being displayed</p>
    

    <h3>Emailer</h3>
    <p>To send a message, the system use the 'to' method on the Mail facade. The to method accepts an email addresses of certain target group of a certain category. If you pass an object or collection of objects, the mailer will automatically use their email and name properties when setting the email recipients.</p>

    <h3>CV Request</h3>
    <p>CV request can be made in various ways;<br>
        Job application: Whenever there is a job application, employer can get access to CVs of applicants for free<br>
        Stawi: This product package allows an employer to access CVs of the candidates <br>
        job@emploi.co : A request for CVs from this email is granted automatically<br>
        Plain request: a registered employer can request a CV of a particular job seeker.This must be approved by admin</p>

    <h3>CV Editing</h3>
    <p>A job seeker can request for CV Editing services offered at a cost. The CVs are edited by registered CV Editors who are created by admin. It is also the admin who assigns CV editing work</p>
    <p>The CV editors are responsible editing and submitting back an updated CV</p>


<h3>Errors</h3>
<div class="container">
<p>All errors and exceptions, both custom and default, are handled by the Handler class in
app/Exceptions/Handler.php. Then views related to specific error is created at resources/views/errors folder.</p>
    <div class="row">
        <div class="col-md-3">
        <b>Error</b>
        </div>
        <div class="col-md-9">
        <b>Description</b>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
         401
        </div>
        <div class="col-md-9">
         <p>This error indicates that the requested file requires authentication (a username and password).</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
        403
        </div>
        <div class="col-md-9">
        <p>This error indicates that the server will not allow the visitor to access the requested file. If a visitor receives this code unexpectedly, you should check the file's permission settings, or check whether the file has been protected.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
        404
        </div>
        <div class="col-md-9">
        <p>This error indicates that the server could not find the file that the visitor requested. This commonly occurs when a URL is mistyped.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
        419
        </div>
        <div class="col-md-9">
        <p>Indicates that previously valid authentication has expired. </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
        429
        </div>
        <div class="col-md-9">
        <p>Indicates the user has sent too many requests in a given amount of time.</p>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
        500
        </div>
        <div class="col-md-9">
        <p>This error indicates that the server has encountered an unexpected condition. This often occurs when an application request cannot be fulfilled due to the application being configured incorrectly on the server.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
        503
        </div>
        <div class="col-md-9">
        <p>This error occurs when the server is unable to handle requests due to a temporary overload or due to the server being temporarily closed for maintenance. The error indicates that the server will only temporarily be down.</p>
        </div>
    </div>
  
             </div>
            </div>
        </div>
    </div>
</div>

@endsection