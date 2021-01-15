<!-- Filter -->
<div class="job-filter-area pt-2">
    <div class="container-fluid">
        <form method="get" class="form-row" action="#"> 
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <input type="text" name="q" class="form-control" placeholder="Enter Keyword(s)" value="{{ isset($search_query) ? $search_query : '' }}" maxlength="50">
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