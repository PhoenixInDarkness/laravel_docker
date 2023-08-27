@extends('layout')

@section('script')
    <script defer>
        function search(event)
        {
            let input = document.getElementById("searchInput");

            if (event !== undefined && event.code === 'Enter') {
                if (input.value !== '') {
                    location.replace('{{route('ads_search')}}' + '?search=' + input.value);
                }
            }

            if (event === undefined) {
                if (input.value !== '') {
                    location.replace('{{route('ads_search')}}' + '?search=' + input.value);
                }
            }
        }
    </script>
@endsection

@section('content')
    <div class="top-section-main border-bottom border-dark">
        <div class="top-section">
            <div class="w-100 h-100 top-section-blur d-flex">
                <div class="m-auto">
                    <div class="col-md-8 m-auto d-flex text-center">
                        <span class="d-flex align-items-center main-text main-top-text mx-auto">Find what you need around</span>
                    </div>
                    <div class="search-section mx-auto">
                        <div class="search-box m-auto d-flex col align-center justify-content-center bg-transparent mx-4" onclick="search()">
                            <input id="searchInput" class="border-gray focus-ring shadow-none border-end-0 p-3 search-border-tl-bl search-input h-75" onkeydown="search(event)" autofocus>
                            <button class="border-gray border-start-0 p-3 search-border-tr-br search-button h-75" onclick="search()" type="button">
                                <img src="/images/search.png" alt="">
                            </button>
                        </div>
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
                    @foreach($categories as $category)
                        <a href="{{route('ads_category', $category->slug)}}" class="text-decoration-none">
                            <li class="black-categories">{{ $category->name }}</li>
                        </a>
                    @endforeach
                </div>
                @foreach($ads as $ad)
                    <div class="col-md-3 px-4 pb-5">
                        <div class="card px-0 border-gray bg-darkness">
                            <a href="{{ route('ads_view', ['slug' => $ad->slug]) }}" class="text-decoration-none">
                                <img class="card-img-top" src="{{ asset($ad->getPreviewPhoto()) }}" alt="preview">
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
@endsection

