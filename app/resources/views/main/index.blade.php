@extends('layout')

@section('content')
    <div class="top-section-main border-bottom border-dark">
        <div class="top-section">
            <div class="container main-top-container">
                <div class="col-md-8 m-auto d-flex text-center">
                    <span class="d-flex align-items-center main-text">Find what you need around</span>
                </div>
                <div class="search-section">
                    <div class="search-box col-md-7 m-auto d-flex row align-center">
                        <input class="col-md-10 search-border m-auto search-input m-">
                        <button class="col-md-1 search-border m-auto search-button">
                            <img src="/images/search.png" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-darkness w-100" style="max-width: 100%;">
        <div class="col-md-12 m-auto text-center pt-3 pb-5">
            <h2 class="mt-3 pt-3 main-separator">Featured ads</h2>
        </div>
        <div class="container">
            <div class="m-auto col-md-12 d-flex row card-section">
                <div class="col-md-12 black-categories-panel px-4 mb-5">
                    <li class="black-categories">Vehicles</li>
                    <li class="black-categories">Gadgets</li>
                    <li class="black-categories">Jobs</li>
                    <li class="black-categories">Job applicant</li>
                    <li class="black-categories">Real estate</li>
                    <li class="black-categories">Service</li>
                    <li class="black-categories">Accommodation</li>
                    <li class="black-categories">Parts</li>
                </div>
                @foreach($ads as $ad)
                    <div class="col-md-3 px-4 pb-5">
                        <div class="card px-0 border-gray bg-darkness">
                            <a href="{{ route('ads_view', ['id' => $ad->id]) }}" class="text-decoration-none">
                                <img class="card-img-top" src="{{ asset($ad->getPreviewPhoto()) }}">
                                <div class="card-body">
                                    <p class="card-title">&euro; {{$ad->price}}</p>
                                    <p class="card-text mb-0">{{ $ad->title }}</p>
                                    <small class="text-white-50">{{ $ad->city??'none' }}</small>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection

