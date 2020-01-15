<form method="POST" action="/apply-easy/{{ $post->slug }}/" enctype="multipart/form-data">
    @csrf
    @if($post->externalSimpleApply())
        <input type="hidden" name="external_apply" value="{{ $post->externalSimpleApply() }}">
    @endif
    <div>
        <label>Full Name <strong class="text-danger">*</strong></label>
        <input type="text" name="name" maxlength="50" required="" class="form-control">
    </div>
    <div>
        <label>E-mail Address <strong class="text-danger">*</strong></label>
        <input type="email" name="email" maxlength="50" required="" class="form-control">
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number <strong class="text-danger">*</strong></label>
        <div class="row pl-3">
            <select class="custom-select col-3" name="prefix">
                @foreach(\App\Country::active() as $c)
                <option value="{{ $c->id }}">
                    {{ $c->code }} {{ $c->prefix }}
                </option>
                @endforeach
            </select>
            <input type="number" required="" path="phone_number" value="{{ old('phone_number') }}" name="phone_number" id="phone_number" class="form-control col-8 ml-3" placeholder="7123123123"
              oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" />
        </div>
    </div>
    <div>
        <label>Gender <strong class="text-danger">*</strong></label>
        <select name="gender" class="form-control">
            <option value="M">Male</option>
            <option value="F">Female</option>
            <option value="I">Other</option>
        </select>
    </div>

    <div>
        <label>Attach Resume <strong class="text-danger">*</strong> (.doc, .docx or .pdf) <small>(Max 5MB)</small> </label>
        <input type="file" name="resume" required="" accept=".doc, .docx,.pdf">
    </div>
    <br>
    <div>
        <input type="submit" value="Submit Application" class="btn btn-orange">
    </div>

</form>