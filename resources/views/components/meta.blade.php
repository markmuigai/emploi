<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
?>, Employment/Career Consulting Services, Employment/Internships, Education/Post-Secondary Education, Employment/Accounting & Finance Jobs, Employment/IT & Technical Jobs, Employment/Executive & Management Jobs, Employment/Clerical & Administrative Jobs, Employment/Sales & Marketing Jobs, Business Services/Staffing & Recruitment Services,  Part time, Receptionist, Sales, Customer service, Human resources, Manager, Warehouse, Marketing, Administrative, Retail, Work from home, Medical assistant, IT jobs in Nairobi, Accountant, Data entry jobs, Finance jobs, Executive assistant, Manufacturing jobs, Project manager jobs, Construction jobs, Entry level jobs, Office jobs, Engineering vacancies, Engineering jobs, Clerical, Mechanical engineer, Education, Cashier, Paralegal, Part-time, Information technology, Office manager, Management, Accounts payable, Business analyst, Attorney, Banking, Driver, Full time, Healthcare, Graphic designer, Bookkeeping, Analyst, Pharmacist, Legal, Call center jobs , Security, Insurance, Purchasing, Warehouse worker, Director, Sales representative, Nurse, Logistics jobs, Real estate, Automotive, Payroll, Operations manager, Medical, Supervisor, Office assistant, Engineering, Teacher, Secretary, Sales manager, Software engineer, Electrician, Registered nurse jobs, Recruiter, Welder, Social worker, Assistant, Customer services representative, Nurse practitioner, Delivery driver, Medical office receptionist, Truck driver, Financial analyst, Office clerk, Graphic design, Electrical engineer, Account manager, Pharmacy technician, Medical billing, Dental assistant, Warehouse manager, Accounts receivable, Mechanic, Technician, Supply chain, Buyer, Data analyst, Agencies in Kenya, Recruitment agencies, Job agencies, Latest hr jobs, Latest jobs , Latest jobs in Nairobi, Current jobs in Nairobi, Current jobs in ngos, Vacancies, Job vacancies, Best jobs in Kenya, Jobs in Kenya, Vacancies in Kenya, Recruitment companies in Kenya, Jobs, Job search, Psychometric tests, Examples of psychometric tests, Ngo vacancies in kenya, Ngo, Banking jobs, Banking jobs in kenya, Background check,Interviews, Interview coaching, Job placement, Hiring, Job search, Jobs sites in kenya, Hr, Human resources, Jobs in nairobi, Vacancies in nairobi, Entry level jobs in nairobi, Graduate jobs in nairobi, Safaricom jobs, Delloite jobs, Pwc jobs, Hr manager, Accounting, Administration, Banking, Financial services, Sales manager, Customer service jobs, General Manager, Electrician, Construction jobs, Pharmaceutical, Manufacturing, Tourism jobs, Procurement, Sales, Real estate, Driver, Transport, Logistics, Job advertisement, Career, Employment, Employment website, Employment agency, Recruitment agency, Online jobs, Training companies in Nairobi, Training companies in Kenya, Hr companies in Nairobi, Hr companies in Kenya, Talent management, Cover letter, Cv, Resume, Application, Graduate trainee, Internship, Online job placement, Kenyan vacancies, Jobs in kenya, Vacancies in kenya, Interview advice, Coaching, Post a job, Government jobs, Government jobs, Resume, Careerbuilder, Job search, Career, Recruitment, Part time jobs, Online jobs, Headhunter, Monster jobs, Job bank, Jobs hiring, Vacancy, Job vacancies, Jobs in Dubai, Ups jobs, Employment, Hire, Jobsite, Google jobs, Un jobs, Job today, Bank jobs, Job Centre, Highest paying jobs, Job description, Freelance jobs, Job search, Security jobs, Data entry jobs, Job application, Driving jobs, Warehouse jobs, Times jobs, Gov jobs, Job sites, Job finder, Good job, Jobs in canada, Dubai jobs, Recruitment agencies, Job interview questions, Job corps, Job opportunities, It jobs, Engineering jobs, Civil engineering jobs, Call center jobs, Human resources jobs, Best jobs, Jobs in delhi, Construction jobs, Graduate jobs, Airport jobs, Job search sites, Job seekers, Job fair, New job, Employment agencies, Retail jobs, Receptionist jobs, Summer jobs, Job interview, Welding jobs, Jobs for teens, Customer service jobs, Teaching jobs, Marketing jobs, Hotel jobs, Arts jobs, Job com, Job websites, Job openings, Find job, Jobs online, Weekend jobs, Student jobs, Job seek, Driving jobs, Nursing jobs, Jobs in Qatar, Qatar jobs, Canada jobs, Jobs in Dubai, Travel jobs, Environmental jobs, Police jobs, Hiring jobs, Full time jobs, Job boards, Accounting jobs, Administration jobs, Online writing jobs, HR consulting, Human resource in Kenya, Human resource in Nairobi, Payroll solutions, Performance management, Fuzu, Brightermonday, Jobsinkenya, Myjobsinkenya, Careerpoint, The star jobs, The star classifieds, Sportpesa, Betin, Betpawa, New betting company kenya, Betting companies, Best betting companies in kenya, Jobweb kenya, Advance Africa, Linkedin jobs, Job mag kenya, Brites, Career advice, Yusudi, Safaricom jobs, Airtel jobs, KCB Jobs, Equity jobs, Co-operative bank jobs, Corporate staffing, Kenyan career, Kenyan jobs, Jobs in Kenya, Kenya jobs, Kenyan job, CV Writing, Application tracker, Emploi, Emploi HR, Emploi Recruitment, Employ Nairobi, Employ, Emploi Rwanda, Emploi Tanzania, Emploi Uganda, Jobs in Africa, Jobs in Kenya, Jobsikaz, Recruitment, Exclusive Placement, HR outsource, Advertise a job, Emploi Recruitment, Employ Recruitment, Emploi Kenya, Emploi.co Kenya, Kenya, African Jobs, EAC Jobs, East African Jobs, South Africa Jobs, West Africa Jobs, Nigeria Jobs, Southern Africa Jobs,Jobs in Central, Jobs in Kikuyu, Jobs in Nairobi, On the Job Training, kra jobs, Paid Internships, KPLC Jobs, Remote work, Developer jobs, System analyst, Database administrator, Clinician, Journalism, Curriculum vitae, KenGen, Toyota, Transport manager, Insurance, Contract, Plant Operator, Private Organization, Public Organization, Public Relations, Advertisements, Jobs near me, Opportunities, Recent jobs, January Vacancies, February vacancies, March vacancies, April vacancies, May vacancies, June vacancies, July vacancies, August vacancies, September vacancies, October vacancies, November vacancies, December vacancies, Jobs in Kenya today, Staffing company, New jobs, Government jobs in Kenya, Local jobs, County jobs in Kenya, Looking for job, Employment sites, Career opportunities, CV editing, PaaS, Part Timers, Part time jobs, free, latest job vacancies, companies hiring , job advertiment, latest jobs in kenya, latest vacancies, career opportunities, latest job openings, companies recruiting, internship opportunities, ongoing recruitement, career tips, career coaching, interview coaching and techniques, job search in kenya, job placement, job platforms, vacancies in africa, companies in 2020, latest jobs in 2020, job updates, outsourcing for recruitment, cv writing services, best cv editing services, resueme editor, professional resume editing, proofreading cv, free cv template, free cv builder, free cv review, resume writers and editors, cover letter writing, free sampe cvs, self-assessment

" />
<meta name="description" content="@yield('description')" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- PWA -->
<link rel="manifest" href="/manifest.json">
<meta name="theme-color" content="#500095">
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="Emploi">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Emploi">
<link rel="apple-touch-icon" href="/images/icons/icon-512x512.png">
<link href="/images/icons/splash-640x1136.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-750x1334.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1242x2208.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1125x2436.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-828x1792.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1242x2688.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1536x2048.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1668x2224.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1668x2388.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-2048x2732.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<meta name="msapplication-TileColor" content="#ff5e00">
<meta name="msapplication-TileImage" content="/images/icons/icon-512x512.png">
<meta name="google-site-verification" content="U07YRrF0-1t_zFXZ5RhrQbcezxvv3Kke_P6lkgwc9oc" />
@yield('meta-include')
<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/OneSignalSDKWorker.js', {
            scope: '.'
        }).then(function(registration) {
            // Registration was successful
            //console.log('Emploi PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function(err) {
            // registration failed :(
            console.log('Emploi PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154451264-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-154451264-1');
</script>


<!-- END PWA -->
<script data-ad-client="ca-pub-9948474979900683" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- <script data-ad-client="ca-pub-1190977631366836" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->





