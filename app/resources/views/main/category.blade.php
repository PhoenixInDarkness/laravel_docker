@extends('layout')

@section('content')
    <div class="search-container @if($ads->total() === 0) vh-100 @endif">
        <div class="col-md-12 m-auto text-center pt-3 pb-5">
            <h2 class="mt-3 pt-3 main-separator">
                @if($ads->total() === 0)
                    <span>No ads found</span>
                @elseif($ads->total() === 1)
                    <span>{{$ads->total()}} item</span>
                @elseif($ads->total() > 1)
                    <span>{{$ads->total()}} items</span>
                @endif
                in category "{{$category}}"
            </h2>
        </div>
        <div class="bg-darkness col-12 col-md-10 mx-auto pt-5 @if($ads->total() === 0) d-none @endif" style="max-width: 100%;">
            <div class="container pt-5">
                <div class="m-auto col-12 d-flex row card-section">
                    @foreach($ads as $ad)
                        <div class="col-md-6 col-lg-4 col-xl-3 px-4 pb-5">
                            <div class="card px-0 border-gray bg-darkness">
                                <a href="{{ route('ads_view', ['slug' => $ad->slug]) }}" class="text-decoration-none">
                                    <img class="card-img-top" src="{{ asset($ad->getPreviewPhoto()) }}" alt="img">
                                    <div class="card-body">
                                        <p class="card-title">&euro; {{$ad->price}}</p>
                                        <p class="card-text mb-0">{{ $ad->title }}</p>
                                        <small class="text-white-50">{{ $ad->city??'none' }}</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex flex-row-reverse px-4 dark">
                        {{ $ads->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
