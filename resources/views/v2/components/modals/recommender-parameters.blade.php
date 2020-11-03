<div class="modal fade" id="recommendedModal" tabindex="-1" role="dialog" aria-labelledby="recommendedModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h4 class="text-center mt-4">
                Select your details
            </h4>
                <div class="modal-body">
                <form method="POST" action="{{route('v2.recommendation.store')}}">
                    @csrf
                    <div class="job-filter-area pt-2">
                        <div class="container">
                            <form>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <select name="industry">
                                                <option>Select Your Industry</option>
                                                @foreach(\App\Industry::active() as $i)
                                                    <option value="{{ $i->id }}">{{ $i->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-12">
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
                                    <div class="col-sm-6 col-lg-12">
                                        <button type="submit" class="btn cmn-btn">
                                            Fetch Recommended Jobs
                                            <i class='bx bx-search-alt'></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>