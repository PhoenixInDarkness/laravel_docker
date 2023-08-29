@extends('layout')

@section('content')
    <div class="bg-darkness w-100 vh-100" style="max-width: 100%;">
        <div class="container position-relative col-md-4 m-auto">
            <div class="align-items-center border-gray text-bg-darkness bg-d-light p-5" style="margin-top: 5rem !important;">
                <form method="POST" class="my-auto" action="{{ route('login') }}">
                    @csrf

                    <div class="d-flex justify-content-end pb-5">
                        <a href="{{ url('/auth/google/redirect') }}" class="btn mx-auto">
                            <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                        </a>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <hr class="flex-grow-1">
                        <span class="mx-3 text-white-50">OR</span>
                        <hr class="flex-grow-1">
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                               required autofocus autocomplete="username">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" class="form-control" type="password" name="password" required
                               autocomplete="current-password">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-3">
                        <div class="form-check">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        @if (Route::has('password.request') && false)
                            <a class="text-decoration-none me-3 text-white-50" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
