@extends('layouts.dashboard-layout')

@section('title','Emploi :: Previous Company Sizes')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Company Size')
<div class="card">
    <div class="card-body">
        <h2>
            {{ $application->user->name }} <br>
        </h2>
        <p>
            <a href="/employers/applications/{{ $application->post->slug }}/">
                {{ $application->post->title }}
            </a>
            ||
            <a href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi">
                RSI {{ $application->user->seeker->getRsi($application->post) }}%
            </a>
        </p>
        <form method="POST" action="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/company-sizes">
            @csrf
            <div id="company-sizes-pool">
                @forelse($application->seekerPreviousCompanySizes as $i)
                <div class="form-group">
                    <label>Company Name <b style="color: red" title="Required">*</b></label>
                    <span class="pull-right rm-company-size"><i class="fas fa-times text-danger"></i></span>
                    <input type="text" name="company_name[]" required="" value="{{ $i->name }}" class="form-control mb-3">
                    <select required="" name="company_size[]" class="custom-select">
                        <option value="">- Select -</option>
                        @foreach($sizes as $s)
                        <option value="{{ $s->id }}" @if($i->company_size_id == $s->id)
                            selected="selected"
                            @endif
                            >{{ $s->title }}</option>
                        @endforeach
                    </select>
                </div>
                @empty
                <div class="form-group">
                    <label>Company Name <b style="color: red" title="Required">*</b></label>
                    <span class="pull-right rm-company-size"><i class="fas fa-times text-danger"></i></span>
                    <input type="text" name="company_name[]" required="" class="form-control mb-3">
                    <select required="" name="company_size[]" class="custom-select">
                        <option value="">- Select -</option>
                        @foreach($sizes as $s)
                        <option value="{{ $s->id }}">{{ $s->title }} people</option>
                        @endforeach
                    </select>
                </div>
                @endforelse
            </div>

            <input type="submit" name="button" class="btn btn-orange pull-right" value="Submit">
            <a id="add-company" class="btn btn-orange-alt mr-2 pull-right">Add Company</a>
        </form>
    </div>
</div>


<script type="text/javascript">
    <?php
    $sz = '';
    foreach($sizes as $s) {
        $sz .= "[".$s->id.", $s->lower_limit, $s->upper_limit],";
    }
    $sz = '['.$sz.']';
    echo 'var sizes='.$sz.';'; 
    ?>
    //console.log(sizes);
    $().ready(function() {
        $('#add-company').click(function() {
            var $i = '' +
                '<div class="form-group">' +
                '<label>Company Name <b style="color: red" title="Required">*</b></label>' +
                '<span class="rm-interview-score" style="float: right"><i class="fas fa-times text-danger"></i></span>' +
                '<input type="text" name="company_name[]" required="" class="form-control">' +
                '<select required="" name="company_size[]" class="custom-select">' +
                '<option value="">- Select -</option>';
            for (var i = 0; i < sizes.length; i++) {
                $i += '' +
                    '<option value="' + sizes[i][0] + '">' + sizes[i][1] + ' - ' + sizes[i][2] + ' people</option>';

            }
            $i += '' +
                '</select>' +
                '</div>';
            $('#company-sizes-pool').append($i);

            $('.rm-company-size').click(function() {
                $(this).parent().remove();
            });
        });

        $('.rm-company-size').click(function() {
            $(this).parent().remove();
        });
    });
</script>

@endsection
