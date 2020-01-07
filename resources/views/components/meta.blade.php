<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" id="csrf_token">
<link rel="icon" sizes="512x512" href="{{ asset('images/favicon.png') }}">
<meta property="og:image" content="{{ asset('images/500g.png') }}">
<meta name="keywords" content="Jobs in Nairobi, Jobs in Kisumu, Job sites in Kenya, Jobs in Mombasa, Kenya, Best, Administrative assistant, Accounting, Part time, Receptionist, Sales, Customer service, Human resources, Manager, Warehouse, Marketing, Administrative, Retail, Work from home, Medical assistant, IT jobs in Nairobi, Accountant, Data entry jobs, Finance jobs, Executive assistant, Manufacturing jobs, Project manager jobs, Construction jobs, Entry level jobs, Office jobs, Engineering vacancies, Engineering jobs, Clerical, Mechanical engineer, Education, Cashier, Paralegal, Part-time, Information technology, Office manager, Management, Accounts payable, Business analyst, Attorney, Banking, Driver, Full time, Healthcare, Graphic designer, Bookkeeping, Analyst, Pharmacist, Legal, Call center jobs , Security, Insurance, Purchasing, Warehouse worker, Director, Sales representative, Nurse, Logistics jobs, Real estate, Automotive, Payroll, Operations manager, Medical, Supervisor, Office assistant, Engineering, Teacher, Secretary, Sales manager, Software engineer, Electrician, Registered nurse jobs, Recruiter, Welder, Social worker, Assistant, Customer services representative, Nurse practitioner, Delivery driver, Medical office receptionist, Truck driver, Financial analyst, Office clerk, Graphic design, Electrical engineer, Account manager, Pharmacy technician, Medical billing, Dental assistant, Warehouse manager, Accounts receivable, Mechanic, Technician, Supply chain, Buyer, Data analyst, Agencies in Kenya, Recruitment agencies, Job agencies, Latest hr jobs, Latest jobs , Latest jobs in Nairobi, Current jobs in Nairobi, Current jobs in ngos, Vacancies, Job vacancies, Best jobs in Kenya, Jobs in Kenya, Vacancies in Kenya, Recruitment companies in Kenya, Jobs, Job search, Psychometric tests, Examples of psychometric tests, Ngo vacancies in kenya, Ngo, Banking jobs, Banking jobs in kenya, Background check,Interviews, Interview coaching, Job placement, Hiring, Job search, Jobs sites in kenya, Hr, Human resources, Jobs in nairobi, Vacancies in nairobi, Entry level jobs in nairobi, Graduate jobs in nairobi, Safaricom jobs, Delloite jobs, Pwc jobs, Hr manager, Accounting, Administration, Banking, Financial services, Sales manager, Customer service jobs, General Manager, Electrician, Construction jobs, Pharmaceutical, Manufacturing, Tourism jobs, Procurement, Sales, Real estate, Driver, Transport, Logistics, Job advertisement, Career, Employment, Employment website, Employment agency, Recruitment agency, Online jobs, Training companies in Nairobi, Training companies in Kenya, Hr companies in Nairobi, Hr companies in Kenya, Talent management, Cover letter, Cv, Resume, Application, Graduate trainee, Internship, Online job placement, Kenyan vacancies, Jobs in kenya, Vacancies in kenya, Interview advice, Coaching, Post a job, Government jobs, Government jobs, Resume, Careerbuilder, Job search, Career, Recruitment, Part time jobs, Online jobs, Headhunter, Monster jobs, Job bank, Jobs hiring, Vacancy, Job vacancies, Jobs in Dubai, Ups jobs, Employment, Hire, Jobsite, Google jobs, Un jobs, Job today, Bank jobs, Job Centre, Highest paying jobs, Job description, Freelance jobs, Job search, Security jobs, Data entry jobs, Job application, Driving jobs, Warehouse jobs, Times jobs, Gov jobs, Job sites, Job finder, Good job, Jobs in canada, Dubai jobs, Recruitment agencies, Job interview questions, Job corps, Job opportunities, It jobs, Engineering jobs, Civil engineering jobs, Call center jobs, Human resources jobs, Best jobs, Jobs in delhi, Construction jobs, Graduate jobs, Airport jobs, Job search sites, Job seekers, Job fair, New job, Employment agencies, Retail jobs, Receptionist jobs, Summer jobs, Job interview, Welding jobs, Jobs for teens, Customer service jobs, Teaching jobs, Marketing jobs, Hotel jobs, Arts jobs, Job com, Job websites, Job openings, Find job, Jobs online, Weekend jobs, Student jobs, Job seek, Driving jobs, Nursing jobs, Jobs in Qatar, Qatar jobs, Canada jobs, Jobs in Dubai, Travel jobs, Environmental jobs, Police jobs, Hiring jobs, Full time jobs, Job boards, Accounting jobs, Administration jobs, Online writing jobs, HR consulting, Human resource in Kenya, Human resource in Nairobi, Payroll solutions, Performance management, Fuzu, Brightermonday, Jobsinkenya, Myjobsinkenya, Careerpoint, The star jobs, The star classifieds, Sportpesa, Betin, Betpawa, New betting company kenya, Betting companies, Best betting companies in kenya, Jobweb kenya, Advance Africa, Linkedin jobs, Job mag kenya, Brites, Career advice, Yusudi, Safaricom jobs, Airtel jobs, KCB Jobs, Equity jobs, Co-operative bank jobs, Corporate staffing, Kenyan career, Kenyan jobs, Jobs in Kenya, Kenya jobs, Kenyan job, CV Writing, Application tracker <?php $posts=\App\Post::featured(20); for($i=0; $i<count($posts); $i++){ print ', '.$posts[$i]->title; } ?>
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
<meta name="msapplication-TileColor" content="#e88725">
<meta name="msapplication-TileImage" content="/images/icons/icon-512x512.png">
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
<!-- Vue JS -->
@if (config('app.env') === 'production')
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
@else
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
@endif
<!-- END Vue JS -->


<script data-ad-client="ca-pub-9948474979900683" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.4.0/dist/lazyload.min.js"></script>

<!-- ONESIGNAL -->
@if(Request::server ("SERVER_NAME") == 'emploi.co')
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "926b129f-755b-4029-a039-e9ef27e36b16",
    });
  });
</script>
@endif

<script src="{{ asset('js/online-monitor.js') }}" async="" defer=""></script>