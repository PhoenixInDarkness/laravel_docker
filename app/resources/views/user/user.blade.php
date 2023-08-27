@extends('layout')

@section('content')
    <div class="p-6">
        <section class="text-center">
            <img
                style="width: 220px; height: 220px; border-radius: 50%; overflow: hidden; position: relative; top: 110px; z-index: 20"
                src="{{$user->avatar}}"/>
        </section>
        <div class="card w-75 mx-auto">
            <div class="card-body">
                <section class="text-black font-bold text-center" style="font-size: 40pt; margin-top: 10rem">
                    {{$user->name}}
                </section>
                <section class="mt-5">
                    <div class="text-center font-bold d-flex flex-row align-items-center justify-content-center"
                         style="font-size: 30pt">
                        <div>User Ads</div>
                        <div class="ads-count-badge">{{$user->ads->count()}}</div>
                    </div>
                    <div class="m-auto d-flex row card-section mt-5">
                        @foreach($user->ads as $ad)
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
                </section>
            </div>
        </div>
    </div>
@endsection
