<!-- Filter -->
<div class="job-filter-area pt-2">
    <div class="container-fluid">
        <form method="get" class="form-row" action="{{route('v2.seekers.index')}}"> 
            @csrf
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
                    <select class="selectpicker" data-live-search="true" name="industry">
                        <option value="">All Industries</option>
                        @forelse($industries as $i)
                            <option value="{{ $i->slug }}" @if(isset($industry->id) && $i->id == $industry->id)
                            selected=""
                            @endif
                            >{{ $i->name }}</option>
                            @empty
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <select class="selectpicker" data-live-search="true" name="location">
                        <option value="">All Locations</option>
                        @forelse($locations as $i)
                            <option value="{{ $i->id }}" @if(isset($location) && $i->id == $location)
                            selected=""
                            @endif
                            >{{ $i->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <button type="submit" class="btn cmn-btn">
                    Search
                    <i class='bx bx-search-alt'></i>
                </button>
            </div>
        </form>
    </div>
</div>
<!-- End Filter -->