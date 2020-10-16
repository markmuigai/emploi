    
<?php
    $posts = \App\Post::where('company_id','!=' ,1)->where('status','active')->where('featured','true')->get();
?>

    <!-- Partner -->
    <div class="partner-area pt-4 pb-5">
        <div class="container">
            <div class="section-title three text-center">
                <h2>Featured Employers</h2>
            </div>
            <div class="partner-slider owl-theme owl-carousel">                    
                @foreach($posts as $p)
                <div class="partner-item">
                   <a href="/companies/{{ $p->company->name }}"> <img src="{{ asset($p->company->logoUrl) }}" alt="{{ $p->company->name }}" class="circle-img"/><br>
                    {{ $p->company->name }}
                   </a>   
                </div>     
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Partner -->