<!DOCTYPE html>
<html lang="ru" style="font-size: 14px;">

<head>
    <link href="{{ mix('css/front.css') }}" rel="stylesheet">
    <link href="{{ mix('css/scss.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    @yield('style')
</head>

<body class="w-100 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
@include('partials.header')

<div class="content start bg-light-body" style="z-index: 100;">
    @yield('content')
</div>

@include('partials.footer')

<script src="{{ mix('js/app.js') }}"></script>
@yield('script')

</body>

</html>
