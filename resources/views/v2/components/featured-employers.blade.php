    
<?php
    $posts = \App\Post::where('company_id','!=' ,1)->where('status','active')->where('featured','true')->get();
?>
    
    <div class="partner-item">
        @foreach($posts as $p)
           <a href="/companies/{{ $p->company->name }}"> <img src="{{ asset($p->company->logoUrl) }}" alt="{{ $p->company->name }}" class="circle-img"/>
           </a>        
        @endforeach
    </div>

   <!--  <div class="partner-item">
        <img src="{{asset('assets-v2/img/home-one/partner1.png')}}" alt="Partner">
        <img src="{{asset('assets-v2/img/home-one/partner1.png')}}" alt="Partner">
    </div>
    <div class="partner-item">
        <img src="{{asset('assets-v2/img/home-one/partner2.png')}}" alt="Partner">
        <img src="{{asset('assets-v2/img/home-one/partner2.png')}}" alt="Partner">
    </div>
    <div class="partner-item">
        <img src="{{asset('assets-v2/img/home-one/partner3.png')}}" alt="Partner">
        <img src="{{asset('assets-v2/img/home-one/partner3.png')}}" alt="Partner">
    </div>
    <div class="partner-item">
        <img src="{{asset('assets-v2/img/home-one/partner4.png')}}" alt="Partner">
        <img src="{{asset('assets-v2/img/home-one/partner4.png')}}" alt="Partner">
    </div>
    <div class="partner-item">
        <img src="{{asset('assets-v2/img/home-one/partner5.png')}}" alt="Partner">
        <img src="{{asset('assets-v2/img/home-one/partner5.png')}}" alt="Partner">
    </div>
    <div class="partner-item">
        <img src="{{asset('assets-v2/img/home-one/partner1.png')}}" alt="Partner">
        <img src="{{asset('assets-v2/img/home-one/partner1.png')}}" alt="Partner">
    </div> -->