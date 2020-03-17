<?xml version="1.0" encoding="utf-8"?>
<jobs>
	@forelse($vacancies as $vacancy)
	@include('partners.jobsora.vacancy')
	@empty
	@endforelse
</jobs> 