<!DOCTYPE html>
<html>
<head>
<title>{{ $name }} - Curriculum Vitae</title>

<meta name="viewport" content="width=device-width"/>
<meta name="description" content="The Curriculum Vitae of Joe Bloggs."/>
<meta charset="UTF-8"> 

<style type="text/css">
	html,body,div,span,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,abbr,address,cite,code,del,dfn,em,img,ins,kbd,q,samp,small,strong,sub,sup,var,b,i,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,figcaption,figure,footer,header,hgroup,menu,nav,section,summary,time,mark,audio,video {
	border:0;
	font:inherit;
	font-size:100%;
	margin:0;
	padding:0;
	vertical-align:baseline;
	}

	article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section {
	display:block;
	}

	html, body {background: white; font-family: 'Lato', helvetica, arial, sans-serif; font-size: 16px; color: #222;}

	.clear {clear: both;}

	p {
		font-size: 1em;
		line-height: 1.4em;
		margin-bottom: 20px;
		color: #444;
	}

	#cv {
		width: 90%;
		background: #f3f3f3;
		margin: 30px auto 0 auto;
	}

	.mainDetails {
		padding: 25px 35px;
		border-bottom: 2px solid #cf8a05;
		background: #ededed;
	}

	#name h1 {
		font-size: 2.5em;
		font-weight: 700;
		font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
		margin-bottom: -6px;
	}

	#name h2 {
		font-size: 2em;
		margin-left: 2px;
		font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
	}

	#mainArea {
		padding: 0 40px;
	}

	#headshot {
		width: 12.5%;
		float: left;
		margin-right: 30px;
	}

	#headshot img {
		width: 100%;
		height: auto;
		-webkit-border-radius: 50px;
		border-radius: 50px;
	}

	#name {
		float: left;
	}

	#contactDetails {
		float: right;
	}

	#contactDetails ul {
		list-style-type: none;
		font-size: 0.9em;
		margin-top: 2px;
	}

	#contactDetails ul li {
		margin-bottom: 3px;
		color: #444;
	}

	#contactDetails ul li a, a[href^=tel] {
		color: #444; 
		text-decoration: none;
		-webkit-transition: all .3s ease-in;
		-moz-transition: all .3s ease-in;
		-o-transition: all .3s ease-in;
		-ms-transition: all .3s ease-in;
		transition: all .3s ease-in;
	}

	#contactDetails ul li a:hover { 
		color: #cf8a05;
	}


	section {
		border-top: 1px solid #dedede;
		padding: 20px 0 0;
	}

	section:first-child {
		border-top: 0;
	}

	section:last-child {
		padding: 20px 0 10px;
	}

	.sectionTitle {
		float: left;
		width: 25%;
	}

	.sectionContent {
		float: right;
		width: 72.5%;
	}

	.sectionTitle h1 {
		font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
		font-style: italic;
		font-size: 1.5em;
		color: #cf8a05;
	}

	.sectionContent h2 {
		font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
		font-size: 1.5em;
		margin-bottom: -2px;
	}

	.subDetails {
		font-size: 0.8em;
		font-style: italic;
		margin-bottom: 3px;
	}

	.keySkills {
		list-style-type: none;
		-moz-column-count:3;
		-webkit-column-count:3;
		column-count:3;
		margin-bottom: 20px;
		font-size: 1em;
		color: #444;
	}

	.keySkills ul li {
		margin-bottom: 3px;
	}

	@media all and (min-width: 602px) and (max-width: 800px) {
		#headshot {
			display: none;
		}
		
		.keySkills {
		-moz-column-count:2;
		-webkit-column-count:2;
		column-count:2;
		}
	}

	@media all and (max-width: 601px) {
		#cv {
			width: 95%;
			margin: 10px auto;
			min-width: 280px;
		}
		
		#headshot {
			display: none;
		}
		
		#name, #contactDetails {
			float: none;
			width: 100%;
			text-align: center;
		}
		
		.sectionTitle, .sectionContent {
			float: none;
			width: 100%;
		}
		
		.sectionTitle {
			margin-left: -2px;
			font-size: 1.25em;
		}
		
		.keySkills {
			-moz-column-count:2;
			-webkit-column-count:2;
			column-count:2;
		}
	}

	@media all and (max-width: 480px) {
		.mainDetails {
			padding: 15px 15px;
		}
		
		section {
			padding: 15px 0 0;
		}
		
		#mainArea {
			padding: 0 25px;
		}

		
		.keySkills {
		-moz-column-count:1;
		-webkit-column-count:1;
		column-count:1;
		}
		
		#name h1 {
			line-height: .8em;
			margin-bottom: 4px;
		}
	}

	@media print {
	    #cv {
	        width: 100%;
	    }
	}

	@-webkit-keyframes reset {
		0% {
			opacity: 0;
		}
		100% {
			opacity: 0;
		}
	}

	@-webkit-keyframes fade-in {
		0% {
			opacity: 0;
		}
		40% {
			opacity: 0;
		}
		100% {
			opacity: 1;
		}
	}

	@-moz-keyframes reset {
		0% {
			opacity: 0;
		}
		100% {
			opacity: 0;
		}
	}

	@-moz-keyframes fade-in {
		0% {
			opacity: 0;
		}
		40% {
			opacity: 0;
		}
		100% {
			opacity: 1;
		}
	}

	@keyframes reset {
		0% {
			opacity: 0;
		}
		100% {
			opacity: 0;
		}
	}

	@keyframes fade-in {
		0% {
			opacity: 0;
		}
		40% {
			opacity: 0;
		}
		100% {
			opacity: 1;
		}
	}

	.instaFade {
	    -webkit-animation-name: reset, fade-in;
	    -webkit-animation-duration: 1.5s;
	    -webkit-animation-timing-function: ease-in;
		
		-moz-animation-name: reset, fade-in;
	    -moz-animation-duration: 1.5s;
	    -moz-animation-timing-function: ease-in;
		
		animation-name: reset, fade-in;
	    animation-duration: 1.5s;
	    animation-timing-function: ease-in;
	}

	.quickFade {
	    -webkit-animation-name: reset, fade-in;
	    -webkit-animation-duration: 2.5s;
	    -webkit-animation-timing-function: ease-in;
		
		-moz-animation-name: reset, fade-in;
	    -moz-animation-duration: 2.5s;
	    -moz-animation-timing-function: ease-in;
		
		animation-name: reset, fade-in;
	    animation-duration: 2.5s;
	    animation-timing-function: ease-in;
	}
	 
	.delayOne {
		-webkit-animation-delay: 0, .5s;
		-moz-animation-delay: 0, .5s;
		animation-delay: 0, .5s;
	}

	.delayTwo {
		-webkit-animation-delay: 0, 1s;
		-moz-animation-delay: 0, 1s;
		animation-delay: 0, 1s;
	}

	.delayThree {
		-webkit-animation-delay: 0, 1.5s;
		-moz-animation-delay: 0, 1.5s;
		animation-delay: 0, 1.5s;
	}

	.delayFour {
		-webkit-animation-delay: 0, 2s;
		-moz-animation-delay: 0, 2s;
		animation-delay: 0, 2s;
	}

	.delayFive {
		-webkit-animation-delay: 0, 2.5s;
		-moz-animation-delay: 0, 2.5s;
		animation-delay: 0, 2.5s;
	}
</style>

<style type="text/css">
	/* latin-ext */
	@font-face {
	  font-family: 'Lato';
	  font-style: normal;
	  font-weight: 300;
	  src: local('Lato Light'), local('Lato-Light'), url(https://fonts.gstatic.com/s/lato/v16/S6u9w4BMUTPHh7USSwaPGR_p.woff2) format('woff2');
	  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
	}
	/* latin */
	@font-face {
	  font-family: 'Lato';
	  font-style: normal;
	  font-weight: 300;
	  src: local('Lato Light'), local('Lato-Light'), url(https://fonts.gstatic.com/s/lato/v16/S6u9w4BMUTPHh7USSwiPGQ.woff2) format('woff2');
	  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
	}
	/* latin-ext */
	@font-face {
	  font-family: 'Lato';
	  font-style: normal;
	  font-weight: 400;
	  src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v16/S6uyw4BMUTPHjxAwXjeu.woff2) format('woff2');
	  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
	}
	/* latin */
	@font-face {
	  font-family: 'Lato';
	  font-style: normal;
	  font-weight: 400;
	  src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v16/S6uyw4BMUTPHjx4wXg.woff2) format('woff2');
	  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
	}
	/* vietnamese */
	@font-face {
	  font-family: 'Rokkitt';
	  font-style: normal;
	  font-weight: 400;
	  src: url(https://fonts.gstatic.com/s/rokkitt/v18/qFdE35qfgYFjGy5hkEmCdubL.woff2) format('woff2');
	  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
	}
	/* latin-ext */
	@font-face {
	  font-family: 'Rokkitt';
	  font-style: normal;
	  font-weight: 400;
	  src: url(https://fonts.gstatic.com/s/rokkitt/v18/qFdE35qfgYFjGy5hkEiCdubL.woff2) format('woff2');
	  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
	}
	/* latin */
	@font-face {
	  font-family: 'Rokkitt';
	  font-style: normal;
	  font-weight: 400;
	  src: url(https://fonts.gstatic.com/s/rokkitt/v18/qFdE35qfgYFjGy5hkEaCdg.woff2) format('woff2');
	  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
	}
	/* vietnamese */
	@font-face {
	  font-family: 'Rokkitt';
	  font-style: normal;
	  font-weight: 700;
	  src: url(https://fonts.gstatic.com/s/rokkitt/v18/qFdE35qfgYFjGy5hkEmCdubL.woff2) format('woff2');
	  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
	}
	/* latin-ext */
	@font-face {
	  font-family: 'Rokkitt';
	  font-style: normal;
	  font-weight: 700;
	  src: url(https://fonts.gstatic.com/s/rokkitt/v18/qFdE35qfgYFjGy5hkEiCdubL.woff2) format('woff2');
	  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
	}
	/* latin */
	@font-face {
	  font-family: 'Rokkitt';
	  font-style: normal;
	  font-weight: 700;
	  src: url(https://fonts.gstatic.com/s/rokkitt/v18/qFdE35qfgYFjGy5hkEaCdg.woff2) format('woff2');
	  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
	}
</style>


<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body id="top">
<div id="cv" class="instaFade">
	<div class="mainDetails">
		<div id="headshot" class="quickFade">
			<img src="{{ $avatar ? '/storage/cv-builder/'.$avatar : '/images/headshot.jpg' }}" alt="{{ $name }}" />
		</div>
		
		<div id="name">
			<h1 class="quickFade delayTwo">{{ $name }}</h1>
			@if($current_position)
			<h2 class="quickFade delayThree">{{ $current_position }}</h2>
			@endif
		</div>
		
		<div id="contactDetails" class="quickFade delayFour">
			<ul>
				<li>e: <a href="mailto:{{ $email }}" target="_blank">{{ $email }}</a></li>
				<li>m: {{ $phone }}</li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	
	<div id="mainArea" class="quickFade delayFive">
		<section>
			<article>
				<div class="sectionTitle">
					<h1>Profile</h1>
				</div>
				
				<div class="sectionContent">
					<p>{{ $summary }}</p>
				</div>
			</article>
			<div class="clear"></div>
		</section>
		
		@if(count(JSON_decode($experience)) > 0)
		<section>
			<div class="sectionTitle">
				<h1>Experience</h1>
			</div>
			
			<div class="sectionContent">
				<?php
				$experience = JSON_decode($experience);

				?>

				@foreach($experience as $e)
				<article>
					<h2>{{ $e[1] }} at {{ $e[0] }}</h2>
					<p class="subDetails">{{ $e[2] }} - {{ $e[3] }}</p>
					<p>{{  $e[4] }}</p>
				</article>
				@endforeach
			</div>
			<div class="clear"></div>
		</section>
		@endif
		

		@if(count($skills)>0)
		
		<section>
			<div class="sectionTitle">
				<h1>Skills</h1>
			</div>
			
			<div class="sectionContent">
				<ul class="keySkills">
					@foreach($skills as $skill)
					<li>{{ $skill->name }}</li>
					@endforeach
				</ul>
			</div>
			<div class="clear"></div>
		</section>

		@endif
		
		@if(count(JSON_decode($education)) > 0)
		<section>
			<div class="sectionTitle">
				<h1>Education</h1>
			</div>
			
			<div class="sectionContent">
				<?php
				$records = JSON_decode($education);
				?>

				@foreach($records as $record)
				<article>
					<h2>{{ $record[0] }}</h2>
					<p class="subDetails">{{ $record[2] }}</p>
					<p>{{ $record[1] }}</p>
				</article>
				@endforeach
				
			</div>
			<div class="clear"></div>
		</section>
		@endif

		@if(isset(Auth::user()->id) && Auth::user()->role == 'seeker' && count(Auth::user()->seeker->referees) > 0)
		<section>
			<div class="sectionTitle">
				<h1>Referees</h1>
			</div>
			
			<div class="sectionContent">
				

				@foreach(Auth::user()->seeker->referees as $ref)
				<article>
					<h2>{{ $ref->name }}</h2>
					<p class="subDetails">{{ $ref->organization }}</p>
					<p>{{  $ref->email }}</p>
					<p>{{  $ref->phone_number }}</p>
				</article>
				@endforeach
			</div>
			<div class="clear"></div>
		</section>
		@endif
		
	</div>
	<p style="text-align: center;">
		<i>
			CV made on <a href="{{ url('/employers/services') }}">Emploi</a>
		</i>
		
	</p>
</div>
</body>
</html>