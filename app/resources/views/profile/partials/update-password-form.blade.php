<section>
    <header>
        <h2 class="h5">
            header
        </h2>

        <p class="mt-1">
            'Ensure your account is using a long, random password to stay secure.'
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="current_password" class="mb-2">111</label>
            <input id="current_password" name="current_password" type="password" class="form-control border-gray mb-4" autocomplete="current-password" />
        </div>

        <div class="form-group">
            <label for="password" class="mb-2">New Password</label>
            <input id="password" name="password" type="password" class="form-control border-gray mb-4" autocomplete="new-password" />
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="mb-2">Confirm Password</label>
            <input id="password_confirmation mb-4" name="password_confirmation" type="password" class="form-control border-gray mb-4" autocomplete="new-password" />
            @error('password_confirmation')
            <span class="text-warning">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3 justify-content-end">
            <button type="submit" class="btn btn-warning ">Save</button>

            @if (session('status') === 'password-updated')
                <p class="">Saved</p>
            @endif
        </div>
    </form>
</section>
