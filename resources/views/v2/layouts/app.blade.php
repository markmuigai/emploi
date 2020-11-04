<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf_token">
        <link rel="icon" sizes="512x512" href="{{ asset('images/favicon.png') }}">
        <meta property="og:type"          content="website" />
        
        <meta property="fb:app_id"  content="336567974134803" />
        <meta property="og:site_name" content="Emploi" />
        <meta name="keywords" content="Jobs in Nairobi, Jobs in Kisumu, Job sites in Kenya, Jobs in Mombasa, Kenya, Best, Administrative assistant, Accounting<?php 
          $posts=\App\Post::recent(100); 
          for($i=0; $i<count($posts); $i++){ 
              print ', '.$posts[$i]->title; 
          }
          $companies=\App\Company::where('name','not like','%sex%')->where('name','not like','%fuck%')->where('name','not like','%http%')->where('name','not like','%adult%')->where('name','not like','%dating%')->orderBy('featured','DESC')->orderBy('id','DESC')->get(); 
          for($i=0; $i<count($companies); $i++){ 
              print ', '.$companies[$i]->name . ' jobs'; 
          } 
          $blogs=\App\Blog::where('status','active')->orderBy('id','DESC')->get(); 
          for($i=0; $i<count($blogs); $i++){ 
              print ', '.$blogs[$i]->title; 
          }
        ?>, Employment/Career Consulting Services, Employment/Internships, Education/Post-Secondary Education, Employment/Accounting & Finance Jobs, Employment/IT & Technical Jobs, Employment/Executive & Management Jobs, Employment/Clerical & Administrative Jobs, Employment/Sales & Marketing Jobs, Business Services/Staffing & Recruitment Services,  Part time, Receptionist, Sales, Customer service, Human resources, Manager, Warehouse, Marketing, Administrative, Retail, Work from home, Medical assistant, IT jobs in Nairobi, Accountant, Data entry jobs, Finance jobs, Executive assistant, Manufacturing jobs, Project manager jobs, Construction jobs, Entry level jobs, Office jobs, Engineering vacancies, Engineering jobs, Clerical, Mechanical engineer, Education, Cashier, Paralegal, Part-time, Information technology, Office manager, Management, Accounts payable, Business analyst, Attorney, Banking, Driver, Full time, Healthcare, Graphic designer, Bookkeeping, Analyst, Pharmacist, Legal, Call center jobs , Security, Insurance, Purchasing, Warehouse worker, Director, Sales representative, Nurse, Logistics jobs, Real estate, Automotive, Payroll, Operations manager, Medical, Supervisor, Office assistant, Engineering, Teacher, Secretary, Sales manager, Software engineer, Electrician, Registered nurse jobs, Recruiter, Welder, Social worker, Assistant, Customer services representative, Nurse practitioner, Delivery driver, Medical office receptionist, Truck driver, Financial analyst, Office clerk, Graphic design, Electrical engineer, Account manager, Pharmacy technician, Medical billing, Dental assistant, Warehouse manager, Accounts receivable, Mechanic, Technician, Supply chain, Buyer, Data analyst, Agencies in Kenya, Recruitment agencies, Job agencies, Latest hr jobs, Latest jobs , Latest jobs in Nairobi, Current jobs in Nairobi, Current jobs in ngos, Vacancies, Job vacancies, Best jobs in Kenya, Jobs in Kenya, Vacancies in Kenya, Recruitment companies in Kenya, Jobs, Job search, Psychometric tests, Examples of psychometric tests, Ngo vacancies in kenya, Ngo, Banking jobs, Banking jobs in kenya, Background check,Interviews, Interview coaching, Job placement, Hiring, Job search, Jobs sites in kenya, Hr, Human resources, Jobs in nairobi, Vacancies in nairobi, Entry level jobs in nairobi, Graduate jobs in nairobi, Safaricom jobs, Delloite jobs, Pwc jobs, Hr manager, Accounting, Administration, Banking, Financial services, Sales manager, Customer service jobs, General Manager, Electrician, Construction jobs, Pharmaceutical, Manufacturing, Tourism jobs, Procurement, Sales, Real estate, Driver, Transport, Logistics, Job advertisement, Career, Employment, Employment website, Employment agency, Recruitment agency, Online jobs, Training companies in Nairobi, Training companies in Kenya, Hr companies in Nairobi, Hr companies in Kenya, Talent management, Cover letter, Cv, Resume, Application, Graduate trainee, Internship, Online job placement, Kenyan vacancies, Jobs in kenya, Vacancies in kenya, Interview advice, Coaching, Post a job, Government jobs, Government jobs, Resume, Careerbuilder, Job search, Career, Recruitment, Part time jobs, Online jobs, Headhunter, Monster jobs, Job bank, Jobs hiring, Vacancy, Job vacancies, Jobs in Dubai, Ups jobs, Employment, Hire, Jobsite, Google jobs, Un jobs, Job today, Bank jobs, Job Centre, Highest paying jobs, Job description, Freelance jobs, Job search, Security jobs, Data entry jobs, Job application, Driving jobs, Warehouse jobs, Times jobs, Gov jobs, Job sites, Job finder, Good job, Jobs in canada, Dubai jobs, Recruitment agencies, Job interview questions, Job corps, Job opportunities, It jobs, Engineering jobs, Civil engineering jobs, Call center jobs, Human resources jobs, Best jobs, Jobs in delhi, Construction jobs, Graduate jobs, Airport jobs, Job search sites, Job seekers, Job fair, New job, Employment agencies, Retail jobs, Receptionist jobs, Summer jobs, Job interview, Welding jobs, Jobs for teens, Customer service jobs, Teaching jobs, Marketing jobs, Hotel jobs, Arts jobs, Job com, Job websites, Job openings, Find job, Jobs online, Weekend jobs, Student jobs, Job seek, Driving jobs, Nursing jobs, Jobs in Qatar, Qatar jobs, Canada jobs, Jobs in Dubai, Travel jobs, Environmental jobs, Police jobs, Hiring jobs, Full time jobs, Job boards, Accounting jobs, Administration jobs, Online writing jobs, HR consulting, Human resource in Kenya, Human resource in Nairobi, Payroll solutions, Performance management, Fuzu, Brightermonday, Jobsinkenya, Myjobsinkenya, Careerpoint, The star jobs, The star classifieds, Sportpesa, Betin, Betpawa, New betting company kenya, Betting companies, Best betting companies in kenya, Jobweb kenya, Advance Africa, Linkedin jobs, Job mag kenya, Brites, Career advice, Yusudi, Safaricom jobs, Airtel jobs, KCB Jobs, Equity jobs, Co-operative bank jobs, Corporate staffing, Kenyan career, Kenyan jobs, Jobs in Kenya, Kenya jobs, Kenyan job, CV Writing, Application tracker, Emploi, Emploi HR, Emploi Recruitment, Employ Nairobi, Employ, Emploi Rwanda, Emploi Tanzania, Emploi Uganda, Jobs in Africa, Jobs in Kenya, Jobsikaz, Recruitment, Exclusive Placement, HR outsource, Advertise a job, Emploi Recruitment, Employ Recruitment, Emploi Kenya, Emploi.co Kenya, Kenya, African Jobs, EAC Jobs, East African Jobs, South Africa Jobs, West Africa Jobs, Nigeria Jobs, Southern Africa Jobs,Jobs in Central, Jobs in Kikuyu, Jobs in Nairobi, On the Job Training, kra jobs, Paid Internships, KPLC Jobs, Remote work, Developer jobs, System analyst, Database administrator, Clinician, Journalism, Curriculum vitae, KenGen, Toyota, Transport manager, Insurance, Contract, Plant Operator, Private Organization, Public Organization, Public Relations, Advertisements, Jobs near me, Opportunities, Recent jobs, January Vacancies, February vacancies, March vacancies, April vacancies, May vacancies, June vacancies, July vacancies, August vacancies, September vacancies, October vacancies, November vacancies, December vacancies, Jobs in Kenya today, Staffing company, New jobs, Government jobs in Kenya, Local jobs, County jobs in Kenya, Looking for job, Employment sites, Career opportunities, CV editing, PaaS, Part Timers, Part time jobs, free
        " />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        
        <!-- Bootstrap CSS --> 
        <link rel="stylesheet" href="{{asset('assets-v2/css/bootstrap.min.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/meanmenu.css')}}">
        <!-- Nice Select JS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/nice-select.css')}}">
        <!-- Boxicon CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/boxicons.min.css')}}">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/fonts/flaticon.css')}}">
        <!-- Popup CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/magnific-popup.css')}}">
        <!-- Odometer CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/odometer.css')}}">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets-v2/css/owl.theme.default.min.css')}}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/animate.min.css')}}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/responsive.css')}}">
        <!-- select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
        <!-- loading bar -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets-v2/css/loading-bar.css')}}"/>

        <link rel="icon" sizes="512x512" href="{{ asset('images/favicon.png') }}">   

        <title>@yield('title')</title>

    </head>
    <body>


         <!-- tawkto -->
        @include('components.tawk')
        <!-- tawkto -->  

        <!-- cookie -->
        @include('cookieConsent::index')
        <!-- cookie -->

        <!-- Preloader -->
        @include('v2.components.preloader')
        <!-- End Preloader -->

        @yield('content')

        <!-- Footer -->
        @include('v2.components.footer')
        <!-- End Footer -->

        <!-- Copyright -->
        @include('v2.components.copyright')
        <!-- End Copyright -->

        @yield('modal')
        <!-- Essential JS -->
        <script src="{{asset('assets-v2/js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('assets-v2/js/popper.min.js')}}"></script>
        <script src="{{asset('assets-v2/js/bootstrap.min.js')}}"></script>
        <!-- Form Validator JS -->
        <script src="{{asset('assets-v2/js/form-validator.min.js')}}"></script>
        <!-- Contact JS -->
        <script src="{{asset('assets-v2/js/contact-form-script.js')}}"></script>
        <!-- Ajax Chip JS -->
        <script src="{{asset('assets-v2/js/jquery.ajaxchimp.min.js')}}"></script>
        <!-- Meanmenu JS -->
        <script src="{{asset('assets-v2/js/jquery.meanmenu.js')}}"></script>
        <!-- Nice Select JS -->
        <script src="{{asset('assets-v2/js/jquery.nice-select.min.js')}}"></script>
        <!-- Mixitup JS -->
        <script src="{{asset('assets-v2/js/jquery.mixitup.min.js')}}"></script>
        <!-- Popup JS -->
        <script src="{{asset('assets-v2/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Odometer JS -->
        <script src="{{asset('assets-v2/js/odometer.min.js')}}"></script>
        <script src="{{asset('assets-v2/js/jquery.appear.js')}}"></script>
        <!-- Owl Carousel JS -->
        <script src="{{asset('assets-v2/js/owl.carousel.min.js')}}"></script>
        <!-- Progressbar JS -->
        <script src="{{asset('assets-v2/js/progressbar.min.js')}}"></script>
        <!-- Nice Scroll-->
        <script src="{{asset('assets-v2/js/jquery.nicescroll.min.js')}}"></script>
        <!-- Select2 JS-->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <!-- Custom JS -->
        <script src="{{asset('assets-v2/js/custom.js')}}"></script>
        <!--Loading Bar-->
        <script type="text/javascript" src="{{asset('assets-v2/js/loading-bar.min.js')}}"></script>

        <!--js in blade-->
        @yield('js')
    </body>
</html>