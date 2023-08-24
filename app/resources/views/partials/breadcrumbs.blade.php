@if (
    'user.' === mb_substr(Route::currentRouteName(), 0, 5)
    ||
    'faq.earn' === mb_substr(Route::currentRouteName(), 0, 8)
    ||
    'sl.courses' === mb_substr(Route::currentRouteName(), 0, 10)
    ||
    'sl.course' === mb_substr(Route::currentRouteName(), 0, 9)
    ||
    'faq.ecosystem' === mb_substr(Route::currentRouteName(), 0, 13)
)
@elseif (count($breadcrumbs))
    <div class="breadcrumb-area">
        <ul class="pl-4 py-1 mb-0 breadcrumb breadcrump-show" itemscope itemtype="http://schema.org/BreadcrumbList">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!$loop->last)
                    <li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                        @if ($breadcrumb->url)
                            <a class="link orange" href="{{ url($breadcrumb->url) }}" itemprop="item" content="{{ url($breadcrumb->url) }}">
                                <span itemprop="name">{{ $breadcrumb->title }}</span>
                                <meta itemprop="position" content="{{ $loop->iteration }}">
                            </a>
                        @else
                            <span itemprop="item" href="{{ url($breadcrumb->url) }}" content="{{ url($breadcrumb->url) }}">
                                <span itemprop="name">{{ $breadcrumb->title }}</span>
                                <meta itemprop="position" content="{{ $loop->iteration }}">
                            </span>
                        @endif
                    </li>
                    <span class="icon md-caret-right ml-3 mr-3"></span>
                @else
                    <li class="current breadcrump-last" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                        <span itemprop="item" href="{{ url($breadcrumb->url) }}" content="{{ url($breadcrumb->url) }}">
                            <span itemprop="name">{{ $breadcrumb->title }}</span>
                            <meta itemprop="position" content="{{ $loop->iteration }}">
                        </span>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endif
