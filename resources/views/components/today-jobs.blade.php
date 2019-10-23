<div class="col_3">
  	<h3 style="background-color: #500095">Featured Jobs</h3>
  	<ul class="list_1">
  		
      @foreach(\App\Post::recent() as $f)
        <li><a href="/vacancies/{{ $f->slug }}">{{ $f->title }}</a></li>
        @endforeach 					
  	</ul>
  </div>