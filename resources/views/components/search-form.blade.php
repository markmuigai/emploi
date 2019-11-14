<div class="row justify-content-center search-bar m-0">
    <div class="col-md-8 col-12">
        <h2>Choose A Job You Love</h2>
        <form method="get" action="/vacancies/search" class="text-center">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="q" required="" class="form-control" placeholder="Enter Keyword(s)" value="" onfocus="" onblur="">
                </div>
                <div class="col-md-4">
                    <select name="location" class="custom-select">
                        <option value="-1">All Locations</option>
                        @foreach(\App\Location::active() as $l)
                        <option value="{{ $l->id }}">{{ $l->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-orange" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
