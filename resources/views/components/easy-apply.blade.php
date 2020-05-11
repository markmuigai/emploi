<form method="POST" action="/apply-easy/{{ $post->slug }}/" enctype="multipart/form-data">
    @csrf
    @if($post->externalSimpleApply())
        <input type="hidden" name="external_apply" value="{{ $post->externalSimpleApply() }}">
    @endif
    <div>
        <label>Full Name <strong class="text-danger">*</strong></label>
        @error('name')
        <div class="text-center my-2 py-1 alert alert-danger" role="alert">
            Invalid Full Name
        </div>
        @enderror
        <input type="text" name="name" maxlength="50" required="" class="form-control" value="{{ old('name') }}">
    </div>
    <div>
        @error('email')
        <div class="text-center my-2 py-1 alert alert-danger" role="alert">
            Invalid Email Address
        </div>
        @enderror
        <label>E-mail Address <strong class="text-danger">*</strong></label>
        <input type="email" name="email" maxlength="50" required="" class="form-control" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        @error('phone_number')
        <div class="text-center my-2 py-1 alert alert-danger" role="alert">
            Invalid Phone Number
        </div>
        @enderror
        <label for="phone_number">Phone Number <strong class="text-danger">*</strong></label>
        <div class="row pl-3">
            <select class="custom-select col-3" name="prefix">
                @foreach(\App\Country::active() as $c)
                <option value="{{ $c->id }}" {{ !is_null(old('prefix')) && old('prefix') == $c->id ? 'selected=""' : '' }}>
                    {{ $c->code }} {{ $c->prefix }}
                </option>
                @endforeach
            </select>
            <input type="number" required="" path="phone_number" value="{{ old('phone_number') }}" name="phone_number" id="phone_number" class="form-control col-8 ml-3" placeholder="712312312"
              oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" />
        </div>
    </div>
    <div>
        @error('gender')
        <div class="text-center my-2 py-1 alert alert-danger" role="alert">
            Invalid Gender
        </div>
        @enderror
        <label>Gender <strong class="text-danger">*</strong></label>
        <select name="gender" class="form-control">
            <option value="M" {{ !is_null(old('gender')) && old('gender') == 'M' ? 'selected=""' : '' }}>Male</option>
            <option value="F" {{ !is_null(old('gender')) && old('gender') == 'F' ? 'selected=""' : '' }}>Female</option>
            <option value="I" {{ !is_null(old('gender')) && old('gender') == 'I' ? 'selected=""' : '' }}>Other</option>
        </select>
    </div>

    <div>
        @error('resume')
        <div class="text-center my-2 py-1 alert alert-danger" role="alert">
            Invalid Resume Attached
        </div>
        @enderror
        <label>Attach Resume <strong class="text-danger">*</strong> (.doc, .docx or .pdf) <small>(Max 5MB)</small> </label>
        <input type="file" name="resume" required="" accept=".doc, .docx,.pdf">
    </div>
    <br>
    <div>
        <input type="submit" value="Submit Application" class="btn btn-orange">
    </div>

</form>