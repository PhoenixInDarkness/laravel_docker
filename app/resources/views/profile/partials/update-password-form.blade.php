<section>
    <header>
        <h2 class="h5 text-dark">
            header
        </h2>

        <p class="mt-1 text-muted">
            'Ensure your account is using a long, random password to stay secure.'
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="current_password">111</label>
            <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
            @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">Save</button>

            @if (session('status') === 'password-updated')
                <p class="text-muted">Saved</p>
            @endif
        </div>
    </form>
</section>
