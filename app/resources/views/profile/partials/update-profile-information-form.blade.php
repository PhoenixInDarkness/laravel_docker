<section>
    <header>
        <h2 class="h5 text-white">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name" class="mb-2">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="form-control border-gray mb-4" value="{{ old('name', $user->name) }}" required autocomplete="name" />
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="mb-2" >{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control border-gray mb-4" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 justify-content-end">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="btn btn-warning btn-sm">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
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
