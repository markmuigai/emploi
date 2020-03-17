<job id="{{ $vacancy->id }}">
	<link><![CDATA[{{ url('/vacancies/'.$vacancy->slug) }}]]></link>
	<name><![CDATA[{{ $vacancy->title }}]]></name>
	<region><![CDATA[{{ $vacancy->location->name }}, {{ $vacancy->location->country->name }}]]></region>
	@if($vacancy->plainMonthlySalary() != 'Salary is not disclosed') 
	<salary><![CDATA[{{ $vacancy->plainMonthlySalary() }}]]></salary>
	@endif
	<description>
		<![CDATA[
			<div> 
				<h3>Job Description</h3>
				{{ $vacancy->responsibilities }}
			</div>
		]]>
		</description>
	<apply_url><![CDATA[{{ url('/vacancies/'.$vacancy->slug) }}]]></apply_url>
	<email><![CDATA[{{ $vacancy->company->email ? $vacancy->company->email : $vacancy->company->getEmail()  }}]]></email>
	@if( $vacancy->company->phone_number )
	<phone><![CDATA[{{ $vacancy->company->phone_number }}]]></phone>
	@endif
	<company><![CDATA[{{ $vacancy->company->name }}]]></company>
	<pubdate>{{ $vacancy->created_at->format('d.m.Y') }}</pubdate>
	<updated>{{ $vacancy->updated_at->format('d.m.Y') }}</updated>
	<expire>{{ \Carbon\Carbon::createFromDate($vacancy->deadline)->format('d.m.Y') }}</expire>
	<jobtype><![CDATA[{{ $vacancy->vacancyType->name }}]]></jobtype>
</job>