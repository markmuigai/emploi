	@include('components.today-jobs')
	
  <div class="col_3">
  	<h3 style="background-color: #500095">Jobs by Category</h3>
  	<ul class="list_2"> 

  		@forelse(\App\Industry::top(10) as $f)
  		<li><a href="/vacancies/{{ $f->slug }}">{{ $f->name }}</a></li>
  		@empty
  		
  		@endforelse					
  	</ul>
  </div>