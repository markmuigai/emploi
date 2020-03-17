<div class="row justify-content-center search-bar m-0">
    <div class="col-md-8 col-12">
        <h3 class="orange text-center">{{ __('jobs.job_u_love') }}</h3>
        <form method="get" action="/vacancies/search" class="text-center">
            <div class="row no-gutters">
                <div class="col-12 col-sm-6 col-md-6">
                    <label for="" style="display: none">Query</label>
                    <input type="text" name="q" required="" class="form-control" placeholder="{{ __('other.e_keywords') }}" value="" onfocus="" onblur="">
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <label for="" style="display: none">Locations</label>
                    <select name="location" class="custom-select">
                        <option value="-1">All Locations</option>
                        @foreach(\App\Location::active() as $l)
                        <option value="{{ $l->id }}">{{ $l->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <button class="btn btn-orange px-5 mt-2 mt-md-0" type="submit">{{ __('other.search') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
