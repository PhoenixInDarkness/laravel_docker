@extends('layout')

@section('content')
    <div class="p-6">
        <section class="text-center">
            <img class="ads-author-avatar" src="{{ asset($user->getAvatar()) }}"/>
        </section>
        <div class="card col-11 col-sm-10 mx-auto bg-darkness text-bg-darkness border-gray">
            <div class="card-body">
                @if(Auth::check() && Auth::user()->id === $user->id)
                    <a class="ads-edit-button" href="{{route('profile.edit')}}">Edit</a>
                @endif
                <section>
                    <div class="ads-author-name">
                        {{$user->name}}
                    </div>
                    @if(Auth::check() && Auth::user()->id === $user->id)
                        <div class="ads-author-contact">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="col-12">
                                    <div class="d-inline-block me-auto">
                                        <svg class="round-40 bg-darkness py-2 ads-author-contact-icon" xmlns="http://www.w3.org/2000/svg"
                                             width="16"
                                             height="16" viewBox="0 0 16 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M0 8C0 3.58883 3.58883 0 8 0C12.4112 0 16 3.58883 16 8C16 12.4112 12.4112 16 8 16C3.58883 16 0 12.4112 0 8ZM14.7992 8C14.7992 4.23736 11.7619 1.2 7.99922 1.2C4.23657 1.2 1.19922 4.23736 1.19922 8C1.19922 11.7626 4.23657 14.8 7.99922 14.8C11.7619 14.8 14.7992 11.7626 14.7992 8ZM8.00039 2.4C4.91457 2.4 2.40039 4.91418 2.40039 8C2.40039 11.0858 4.91457 13.6 8.00039 13.6C8.69124 13.6 9.3557 13.4746 9.96836 13.2445C10.1715 13.1709 10.3194 12.9938 10.3556 12.7808C10.3918 12.5678 10.3106 12.3518 10.1432 12.2153C9.97576 12.0788 9.74784 12.0428 9.54648 12.1211C9.06635 12.3014 8.54634 12.4 8.00039 12.4C5.56301 12.4 3.60039 10.4374 3.60039 8C3.60039 5.56262 5.56301 3.6 8.00039 3.6C10.4378 3.6 12.4004 5.56262 12.4004 8V8.6C12.4004 9.15929 11.9597 9.6 11.4004 9.6C10.8411 9.6 10.4004 9.15929 10.4004 8.6V5.8C10.4028 5.49492 10.1759 5.23659 9.87308 5.19961C9.57025 5.16263 9.28786 5.35877 9.2168 5.65547C8.81185 5.36971 8.32747 5.2 7.80039 5.2C6.33967 5.2 5.20039 6.49099 5.20039 8C5.20039 9.50901 6.33967 10.8 7.80039 10.8C8.54069 10.8 9.1973 10.4673 9.66602 9.94375C10.0698 10.4624 10.6977 10.8 11.4004 10.8C12.6083 10.8 13.6004 9.80791 13.6004 8.6V8C13.6004 4.91418 11.0862 2.4 8.00039 2.4ZM9.20039 8C9.20039 7.08261 8.54527 6.4 7.80039 6.4C7.05552 6.4 6.40039 7.08261 6.40039 8C6.40039 8.91739 7.05552 9.6 7.80039 9.6C8.54527 9.6 9.20039 8.91739 9.20039 8Z"
                                                  fill="#FDFDFE"></path>
                                        </svg>
                                    </div>
                                    <span>{{$user->email}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="col-12">
                                    <svg class="round-40 bg-darkness py-2 ads-author-contact-icon" xmlns="http://www.w3.org/2000/svg" width="14"
                                         height="24" viewBox="0 0 14 24" fill="none">
                                        <path
                                            d="M2.625 0C1.18562 0 0 1.18562 0 2.625V20.7083C0 22.1477 1.18562 23.3333 2.625 23.3333H11.375C12.8144 23.3333 14 22.1477 14 20.7083V2.625C14 1.18562 12.8144 0 11.375 0H2.625ZM2.625 1.75H11.375C11.8688 1.75 12.25 2.13121 12.25 2.625V20.7083C12.25 21.2021 11.8688 21.5833 11.375 21.5833H2.625C2.13121 21.5833 1.75 21.2021 1.75 20.7083V2.625C1.75 2.13121 2.13121 1.75 2.625 1.75ZM7 3.5C6.76794 3.5 6.54538 3.59219 6.38128 3.75628C6.21719 3.92038 6.125 4.14294 6.125 4.375C6.125 4.60706 6.21719 4.82962 6.38128 4.99372C6.54538 5.15781 6.76794 5.25 7 5.25C7.23206 5.25 7.45462 5.15781 7.61872 4.99372C7.78281 4.82962 7.875 4.60706 7.875 4.375C7.875 4.14294 7.78281 3.92038 7.61872 3.75628C7.45462 3.59219 7.23206 3.5 7 3.5ZM5.54167 18.0833C5.42572 18.0817 5.3106 18.1031 5.203 18.1464C5.09541 18.1896 4.99748 18.2538 4.9149 18.3352C4.83233 18.4166 4.76676 18.5136 4.722 18.6206C4.67725 18.7276 4.6542 18.8424 4.6542 18.9583C4.6542 19.0743 4.67725 19.1891 4.722 19.2961C4.76676 19.403 4.83233 19.5001 4.9149 19.5815C4.99748 19.6629 5.09541 19.7271 5.203 19.7703C5.3106 19.8136 5.42572 19.835 5.54167 19.8333H8.45833C8.57428 19.835 8.6894 19.8136 8.797 19.7703C8.90459 19.7271 9.00252 19.6629 9.0851 19.5815C9.16767 19.5001 9.23324 19.403 9.278 19.2961C9.32275 19.1891 9.3458 19.0743 9.3458 18.9583C9.3458 18.8424 9.32275 18.7276 9.278 18.6206C9.23324 18.5136 9.16767 18.4166 9.0851 18.3352C9.00252 18.2538 8.90459 18.1896 8.797 18.1464C8.6894 18.1031 8.57428 18.0817 8.45833 18.0833H5.54167Z"
                                            fill="#FFF"></path>
                                    </svg>
                                    <span>{{$user->phone}}</span>
                                </div>
                            </div>
                        </div>
                    @endif
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
