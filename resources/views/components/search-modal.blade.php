<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-3">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
                <h4 class="orange">{{ __('other.search') }}</h4>
                <form class="form-row" action="/vacancies/search" method="get">
                    <div class="col-9">
                        <input type="text" class="form-control" name="q" placeholder="{{ __('other.search') }}" required="" maxlength="50">
                    </div>
                    <div class="col-3">
                        <button type="submit" name="button" class="btn btn-orange">{{ __('other.search') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>