<div id="preLoader" class="loader-overlay">
    <div class="animsition-loading"></div>
</div>
<header class="header header-height sticky-top
    @if(!isActive('home'))
        bg-darkness
    @endif
">
    <div class="container">
        <div class="header-height d-flex flex-row align-items-center">
            <div class="d-flex justify-content-start align-items-center">
                <img class="logo" src="{{asset('/images/logo.svg')}}" alt="" style="width: 150px; height: auto;">
            </div>
            <nav class="navbar-lg ms-4 w-100">
                <a class="nav-link-lg mx-3 {{ setActive('home') }}" href="{{ route('home') }}">Home</a>
                <a class="nav-link-lg mx-3" href="#">Categories</a>
                @if(Auth::check())
                <a class="nav-link-lg mx-3" href="{{ route('user.show', ['user' => Auth::user()->id]) }}">Profile</a>
                    <div class="ms-auto d-flex" style="margin-right: 11rem !important;">
                        <a class="nav-link-lg mx-3" href="{{ route('new.listing') }}">Create New Listing</a>
                        <a class="nav-link-lg mx-3" href="{{ route('logout') }}">Logout</a>
                    </div>
                @else
                    <div class="ms-auto d-flex" style="margin-right: 11rem !important;">
                        <a class="nav-link-lg mx-3" href="{{ route('login') }}">Login</a>
                        <a class="nav-link-lg mx-3" href="{{ route('register') }}">Register</a>
                    </div>
                @endif
            </nav>
            <div class="d-flex justify-content-end w-100">
                <nav class="navbar navbar-expand-lg header-height">
                    <button class="navbar-toggler bg-white justify-content-end" id="hamburgerNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </div>
    <div class="position-absolute vh-100 w-100 d-none" id="navbarBack"></div>
    <div class="position-fixed sticky w-100 rounded-1 vh-100" id="navbarNav" style="max-width: 0; z-index: 30" data-view="close">
        <ul class="navbar-nav pl-2">
            <li class="nav-item mx-2">
                <a class="nav-link text-white {{ setActive('home') }}" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link text-white" href="#">Categories</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link text-white" href="#">About Us</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link text-white" href="#">Contact Us</a>
            </li>
        </ul>
        <hr class="text-white">
        <ul class="navbar-nav mx-2">
            @if(\Illuminate\Support\Facades\Auth::check())
                <li class="nav-item mx-2">
                    <a class="nav-link text-white" href="{{ route('new.listing') }}">Create New Listing</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-white" href="{{ route('logout') }}">Logout</a>
                </li>
            @else
                <li class="nav-item mx-2">
                    <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                </li>
            @endif
        </ul>
    </div>
</header>

<script>
    document.getElementById('hamburgerNav').onclick = function () {
        let hiddenNavbar = document.getElementById('navbarNav');
        if (hiddenNavbar.dataset.view === 'close') {
            hiddenNavbar.dataset.view = 'show';
            hiddenNavbar.style.setProperty('max-width', '70%');// = 'max-height: max-content'
            hiddenNavbar.style.setProperty('padding-left', '3rem');// = 'max-height: max-content'

            document.getElementById('navbarBack').classList.remove('d-none');
        } else {
            hiddenNavbar.dataset.view = 'close';
            hiddenNavbar.style.setProperty('max-width', '0');
            hiddenNavbar.style.setProperty('padding-left', '0');

            document.getElementById('navbarBack').classList.add('d-none');
        }

        // if (hiddenNavbar.classList.contains('d-none')) {
        //     hiddenNavbar.classList.remove('d-none')
        // } else {
        //     hiddenNavbar.classList.add('d-none')
        // }
    }

    document.getElementById('navbarBack').onclick = function () {
        let hiddenNavbar = document.getElementById('navbarNav');
        hiddenNavbar.dataset.view = 'close';
        hiddenNavbar.style.setProperty('max-width', '0');
        hiddenNavbar.style.setProperty('padding-left', '0');

        document.getElementById('navbarBack').classList.add('d-none');
    }
</script>
