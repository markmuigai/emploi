<!-- Filter -->
<div class="job-filter-area pt-2">
    <div class="container-fluid">
        <form method="get" class="form-row" action="{{route('v2.seekers.index')}}"> 
            @csrf
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <input type="text" name="educationLevel" placeholder="{{ isset(request()->educationLevel) ? request()->educationLevel : 'Education Level' }}" class="form-control" name="educationLevel" list="educationLevelList">
                    <datalist id="educationLevelList">
                        @forelse ($educationLevels as $el)                                             
                            <option>
                                {{ $el->name }}
                            </option>
                        @empty
                        @endforelse
                    </datalist>
                </div>
            </div>
            <div class="col-sm-4 col-lg-2">
                <div class="form-group">
                    <input type="text" name="industry" placeholder="{{ isset(request()->industry) ? request()->industry : 'Industry' }}" class="form-control" name="industry" list="industryList">
                    <datalist id="industryList">
                        @forelse ($industries as $ind)                                             
                            <option>
                                {{ $ind->name }}
                            </option>
                        @empty
                        @endforelse
                    </datalist>
                </div>
            </div>
            <div class="col-sm-4 col-lg-2">
                <div class="form-group">
                    <input type="text" name="location" placeholder="{{ isset(request()->location) ? request()->location : 'Location' }}" class="form-control" name="location" list="locationList">
                        <datalist id="locationList">
                            @forelse ($locations as $loc)                                             
                                <option>
                                    {{ $loc->name }}
                                </option>
                            @empty
                            @endforelse
                        </datalist>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <select class="selectpicker" data-live-search="true" name="sort">
                        <option value="">All Candidates</option>
                        <option value="with-cv">With uploaded CVs</option>
             <!--            <option value="with-assessment">With Self Assessments</option> -->
                    </select>
                </div>
            </div>
            <div class="col-sm-4 col-lg-2">
                <button type="submit" class="btn cmn-btn">
                    Search
                    <i class='bx bx-search-alt'></i>
                </button>
            </div>
        </form>
    </div>
</div>
<!-- End Filter -->