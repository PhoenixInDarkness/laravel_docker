<div id="preLoader" class="loader-overlay">
    <div class="animsition-loading"></div>
</div>
<header class="header header-height">
    <div class="container">
        <div class="d-flex col-lg-12 header-height flex-row">
            <div class="col-md-2 d-flex justify-content-start align-center">
                <img class="logo" src="images/logo.svg" alt="" style="width: 150px; height: auto;">
            </div>
            <div class="col-md-6 d-flex justify-content-md-start justify-content-sm-between">
                <nav class="navbar navbar-expand-lg header-height">
                    <div class="collapse" id="navbarToggleExternalContent">
                        <div class="p-4">
                            <h4 class="text-white">Collapsed content</h4>
                            <span class="text-muted">Toggleable via the navbar brand.</span>
                        </div>
                    </div>
                    <button class="navbar-toggler bg-white justify-content-end" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item mx-2">
                                <a class="nav-link {{ setActive('home') }}" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#">Categories</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#">About Us</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-4">
                <nav class="navbar navbar-expand-lg header-height ">
                    <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item mx-2">
                                <a class="nav-link {{ setActive('login') }}" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link {{ setActive('register') }}" href="{{ route('register') }}">Register</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
