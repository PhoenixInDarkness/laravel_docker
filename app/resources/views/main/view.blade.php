@extends('layout')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@section('content')
    <div class="bg-darkness w-100" style="max-width: 100%;">
        <div class="container">
            <div class="m-auto col-md-12 d-flex row card-section">
                <div id="adsCarousel" class="carousel slide col-md-7 bg-d-black mt-5 border-radius-top" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($photos as $photo)
                            <li data-target="#adsCarousel" data-slide-to="{{ $loop->index }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($photos as $photo)
                            <div class="carousel-item
                            @if($loop->index == 0)
                                active
                            @endif
                            ">
                                <img class="d-block w-100" src="{{ asset($photo) }}" alt="First slide">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#adsCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#adsCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
                <div class="col-md-5 px-4 px-md-2 pb-5 mt-5">
                    <div class="card border-gray bg-darkness">
                        <div class="col-md-12 d-flex px-4 py-4">
                            <div class="col-md-2 m-auto">
                                <img class="avatar m-auto" src="{{ asset($user->getAvatar()) }}">
                            </div>
                            <div class="col-12 px-3">
                                <div class="col-6">
                                    <span class="col-md-12 user-name align-text-bottom">{{$user->name}}</span>
                                </div>
                                <div class="col-6">
                                    <a class="col-md-12 fs-16 text-white-50 " href="{{route('user.show', $user->id)}}">
                                        See all ads
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 bg-d-light d-flex flex-row">
                            <div x-data="{ show: false }" class="d-flex justify-content-between align-items-center col-12 p-4 p-md-1">
                                <svg class="round-40 bg-darkness py-2" xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 14 24" fill="none"><path d="M2.625 0C1.18562 0 0 1.18562 0 2.625V20.7083C0 22.1477 1.18562 23.3333 2.625 23.3333H11.375C12.8144 23.3333 14 22.1477 14 20.7083V2.625C14 1.18562 12.8144 0 11.375 0H2.625ZM2.625 1.75H11.375C11.8688 1.75 12.25 2.13121 12.25 2.625V20.7083C12.25 21.2021 11.8688 21.5833 11.375 21.5833H2.625C2.13121 21.5833 1.75 21.2021 1.75 20.7083V2.625C1.75 2.13121 2.13121 1.75 2.625 1.75ZM7 3.5C6.76794 3.5 6.54538 3.59219 6.38128 3.75628C6.21719 3.92038 6.125 4.14294 6.125 4.375C6.125 4.60706 6.21719 4.82962 6.38128 4.99372C6.54538 5.15781 6.76794 5.25 7 5.25C7.23206 5.25 7.45462 5.15781 7.61872 4.99372C7.78281 4.82962 7.875 4.60706 7.875 4.375C7.875 4.14294 7.78281 3.92038 7.61872 3.75628C7.45462 3.59219 7.23206 3.5 7 3.5ZM5.54167 18.0833C5.42572 18.0817 5.3106 18.1031 5.203 18.1464C5.09541 18.1896 4.99748 18.2538 4.9149 18.3352C4.83233 18.4166 4.76676 18.5136 4.722 18.6206C4.67725 18.7276 4.6542 18.8424 4.6542 18.9583C4.6542 19.0743 4.67725 19.1891 4.722 19.2961C4.76676 19.403 4.83233 19.5001 4.9149 19.5815C4.99748 19.6629 5.09541 19.7271 5.203 19.7703C5.3106 19.8136 5.42572 19.835 5.54167 19.8333H8.45833C8.57428 19.835 8.6894 19.8136 8.797 19.7703C8.90459 19.7271 9.00252 19.6629 9.0851 19.5815C9.16767 19.5001 9.23324 19.403 9.278 19.2961C9.32275 19.1891 9.3458 19.0743 9.3458 18.9583C9.3458 18.8424 9.32275 18.7276 9.278 18.6206C9.23324 18.5136 9.16767 18.4166 9.0851 18.3352C9.00252 18.2538 8.90459 18.1896 8.797 18.1464C8.6894 18.1031 8.57428 18.0817 8.45833 18.0833H5.54167Z" fill="#FFF"></path></svg>
                                <span class="text-bg-darkness fs-24" x-text="show ? '123-456-7890' : '***-***-7890'"></span>
                                <div class="round-40-eye bg-darkness py-2">
                                    <button @click="show = !show" class="btn btn-link">
                                        <img :class="{'white-image': true, 'text-secondary': !show, 'text-primary': show}" src="{{ asset('/images/eye.png') }}" alt="" style="height: 15px; width: 30px;">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex justify-content-around px-2 px-lg-5 py-5">
                                @if(Auth::check())
                                    @if(Auth::user()->id !== $user->id)
                                        <a class="btn btn-warning fs-24 fs-md-12 col-md-5" href="{{route('chat', $ad->slug)}}">
                                            Chat
                                        </a>
                                        <a class="btn btn-primary fs-24 col-md-5" href="mailto:{{$user->email}}">
                                            Email
                                        </a>
                                    @else
                                        <a class="btn btn-warning fs-24 fs-md-12 col-md-5" href="{{route('chat.list', $ad->slug)}}">
                                            Chats
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-radius-bottom border-gray col-md-7 px-5 py-5 text-bg-darkness mb-5">
                    <div class="col-md-12 pb-4">
                        <h2 class="bold fs-30">{{ $ad->title }}</h2>
                    </div>
                    <div class="col-md-12 pb-4">
                        <li class="black-categories px-4">Vehicles</li>
                    </div>
                    <div class="col-md-12 pb-4">
                        <span class="bold fs-30">&euro; {{ $ad->price }}</span>
                    </div>
                    <div class="col-md-12 pb-4">
                        <h3 class="bold fs-24">Description</h3>
                        <span class="fs-16">{{ $ad->description }}</span>
                    </div>
                    <div class="col-md-12 pb-4">
                        <h3 class="bold fs-24">Characteristics</h3>
                        @foreach($propertyVariants as $variant)
                            <div class="col-md-12 px-0">
                                <span class="bold fs-16">{{ $variant->getPropertyName() }}: </span>
                                <span class="fs-16">{{ $variant->value }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

