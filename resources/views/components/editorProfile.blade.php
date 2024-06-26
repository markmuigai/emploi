<div class="row">
    <div class="col-md-3">
        <img src="{{ asset($editor->user->getPublicAvatarUrl()) }}" style="width: 100%; border-radius: 50%">
    </div>
    <div class="col-md-5 col-12">
        <h4>
            <a href="#" class="orange">
                {{ $editor->user->name }}
            </a>
        </h4>
        <p>
            Role: {{ $editor->user->role }} <br>
            Industry: {{ $editor->industry_id ? \App\Industry::find($editor->industry_id)->name : 'All Industries' }} <br>
            Registered: {{ $editor->created_at }}
        </p>
        <hr>
        <p>
            @include('components.editorStats')
        </p>
    </div>
    <div class="col-md-4 col-12 text-md-right text-left">
        <p>
            <a href="mailto:{{ $editor->user->email }}" class="orange">{{ $editor->user->email }}</a> <br>
            @if($editor->user->role == 'seeker')
                <a href="tel:{{ $editor->user->seeker->phone_number }}">{{ $editor->user->seeker->phone_number }}</a><br>
            @endif
            Status: {{ $editor->status }}
        </p>
        <hr>
        <a href="/admin/cveditors/{{ $editor->id }}" class="btn btn-orange">View</a>
        <a href="/admin/cveditors/{{ $editor->id }}/edit" class="btn btn-link btn-sm">Edit</a>
    </div>
</div>