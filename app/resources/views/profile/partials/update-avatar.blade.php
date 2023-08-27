<section>
    <form method="post" action="{{ route('profile.avatar') }}" class="mt-4" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <div class="d-flex flex-column pb-3">
                <label class="pb-1 fs-18 text-white" for="photo-upload">Upload avatar</label>
                <div class="item-upload col-md-12">
                    <input id="photo-upload" type="file" name="avatar" class="form-control col-md-12">
                </div>
                <div id="photo-upload__preview" class="upload-preview mt-3 col-md-12 d-flex row"></div>
            </div>
        </div>

        <div class="d-flex align-items-center gap-3 justify-content-end">
            <button type="submit" class="btn btn-warning">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p class="">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
