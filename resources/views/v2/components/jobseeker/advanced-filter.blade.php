<div class="collapse" id="advancedFilter">
    <!-- Filter -->
    <div class="job-filter-area pt-2">
        <div class="container">
            <form method="get" class="form-row" action="{{ url('v2/vacancies/search') }}"> 
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group">
                            <input type="text" name="q" class="form-control" placeholder="Enter Keyword(s)" value="{{ isset($search_query) ? $search_query : '' }}" maxlength="50">
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group">
                            <select class="selectpicker" data-live-search="true" name="industry">
                                <option>All Industries</option>
                                @forelse($industries as $ind)
                                <option value="{{ $ind->id }}" {{ isset($search_ind) && $search_ind == $ind->id ? 'selected=""' : '' }}>
                                    {{ $ind->name }}
                                </option>
                                    @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group">
                            <select class="selectpicker" data-live-search="true" name="location">
                                <option>All Locations</option>
                                @forelse($locations as $l)
                                <option value="{{ $l->id }}" {{ isset($search_location) && $search_location == $l->id ? 'selected=""' : '' }}>
                                    {{ $l->name.', '.$l->country->code }}
                                </option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group">
                            <select class="selectpicker" name="vacancyType" data-live-search="true">
                                <option value="">All Vacancy Types</option>
                                @forelse($vacancyTypes as $l)
                                <option value="{{ $l->id }}" {{ isset($search_vtype) && $search_vtype == $l->id ? 'selected=""' : '' }}>
                                    {{ $l->name }}
                                </option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group">
                            <select class="selectpicker" name="position" data-live-search="true">
                                <option value="">Positions Available</option>

                                @for($i=1; $i<=200;$i++ ) <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group">
                            <select class="selectpicker" name="educationLevel" data-live-search="true">
                                <option value="">All Education Levels</option>
                                @forelse ($educationLevels as $el)                                           
                                <option value="{{ $el->id }}" {{ isset($search_el) && $search_el == $el->id ? 'selected=""' : '' }}>
                                    {{ $el->name }}
                                </option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group">
                             <select class="selectpicker" name="experience" data-live-search="true">
                                <option value="">Experience</option>
                                <option value="0">No Experience Required</option>
                                <option value="6">6 month Experience</option>
                                <option value="12">1 year Experience</option>
                                <option value="24">2 years Experience</option>
                                <option value="36">3 years Experience</option>
                                <option value="48">4 years Experience</option>
                                <option value="60">5 years Experience</option>
                                <option value="72">6 years Experience</option>
                                <option value="84">7 years Experience</option>
                                <option value="96">8 years Experience</option>
                                <option value="108">9 years Experience</option>
                                <option value="120">10 years Experience</option>
                                <option value="132">11 years Experience</option>
                                <option value="144">12 years Experience</option>
                                <option value="156">13 years Experience</option>
                                <option value="168">14 years Experience</option>
                                <option value="180">15 years Experience</option>
                                <option value="192">16 years Experience</option>
                                <option value="204">17 years Experience</option>
                                <option value="216">18 years Experience</option>
                                <option value="228">19 years Experience</option>
                                <option value="240">20 years Experience</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <button type="submit" class="btn cmn-btn">
                            Search
                            <i class='bx bx-search-alt'></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Filter -->
</div>