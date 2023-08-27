@extends('layout')

@section('content')
    <div class="p-6">
        <section class="text-center">
            <img class="ads-author-avatar" src="{{$user->avatar}}"/>
        </section>
        <div class="card w-75 mx-auto">
            <div class="card-body">
                <section class="ads-author-name">
                    {{$user->name}}
                </section>
                <section class="mt-5">
                    <div class="ads-author-title-section">
                        <div>User Ads</div>
                        <div class="ads-count-badge">{{$user->ads->count()}}</div>
                    </div>
                    <div class="m-auto d-flex row card-section mt-5">
                        @foreach($user->ads as $ad)
                            <div class="col-md-6 col-lg-4 col-xl-3 px-4 pb-5">
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
                </section>
            </div>
        </div>
    </div>
@endsection
