
<h1>{{ __('other.blast_off') }}</h1>
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
    <a href="#featured-vacancies" class="btn btn-orange px-4">{{ __('jobs.l_vacancies') }}</a>
    <br class="for-mobile"><br class="for-mobile">
    <a href="/job-seekers/cv-editing#request-cv-edit-form" class="btn btn-white px-4">{{ __('jobs.r_cv_edit') }}</a>
</p>