@extends('layouts.seek')

@section('title','Emploi :: Contact Us')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
	   <div class="contact_top">
	   	 <h2>Our Address</h2>
	     
          <div class="row" style="">
	   	   <div class="addr" style="text-align: center;">
                <p class="secondary3">
                    Syokimau Junction along, Mombasa road <br>
                   Repen Complex. 4th Floor Room 414B</p>

                  <p>
                    <b>Tel:</b> +254 702 068 282
                  </p>
                  <p>
                    <b>E-mail:</b> <a href="malito:info@emploi.co">info@emploi.co</a>
                  </p>
                
           </div>
          </div>
          <div class="clearfix"> </div>
	   </div>
	   <div class="content_bottom">
	   	 <h3>Contact Form</h3>
	   	   <form method="post" action="/contact">
            @csrf
			<div class="contact_box1">
             	<input type="text" class="text" name="name" placeholder="Name" onfocus="" onblur="" required="required">
			 	<input type="text" class="text" name="email" placeholder="E-mail address" onfocus="" onblur="" style="margin-left:3%" required="required">
			 	<input type="text" class="text" name="phone" placeholder="Phone number" required="" onfocus="" onblur="" style="margin-left:3%">
			</div>
			<div class="text_1">
               <textarea placeholder="Message" name="message" onfocus="" onblur="" required=""></textarea>
            </div>
            <div class="form-submit1 form_but1">
	           <input type="submit" id="submit" value="Submit"><br>
	        </div>
			<div class="clearfix"></div>
           </form>
	   </div>
    </div>
</div>
@endsection