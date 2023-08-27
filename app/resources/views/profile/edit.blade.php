@extends('layout')

@section('content')
    <div class="py-5">
        <div class="container mx-auto">
            <div class="row">
                <div class="text-center text-bg-darkness mb-5">
                    <h2 class="font-weight-bold h2">
                        Profile
                    </h2>
                </div>
                <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="mb-4 p-4 bg-darkness text-bg-darkness shadow rounded">
                        <div class="container mx-auto">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="mb-4 p-4  bg-darkness text-bg-darkness shadow rounded">
                        <div class="container mx-auto">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="mb-4 p-4 bg-darkness text-bg-darkness shadow rounded">
                        <div class="container mx-auto">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
