
<h1>Blast Off Your Career</h1>
<p>{{ $line }}</p>
<?php
$subcat = '';
if(isset(Auth::user()->id))
{
	if(isset(Auth::user()->seeker->industry_id))
		$subcat = Auth::user()->seeker->industry->slug;
	else
		$subcat = 'featured';
}

?>
<p>
    <a href="/vacancies/{{ $subcat }}" class="btn btn-orange px-4">Latest Vacancies</a>
    <br class="for-mobile"><br class="for-mobile">
    <a href="/job-seekers/cv-editing#request-cv-edit-form" class="btn btn-white px-4">Request CV Editing</a>
</p>