<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    @include('partials._style')

    @section('pages-style')
    @show
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top" id="navbar-custom">
            <div class="container">
                <span class="navbar-brand visible-mobile">Menu</span>
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="#">Daftar Isi</a></li>
                        <li><a href="#">Tentang Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="container-fluid header-style">
            <div class="container-fluid layer">
                <div class="container" style="height: 100%">
                    <div class="row" style="height: 100%">
                        @section('judul-header')
                        @show
                    </div>
                </div>
            </div>
        </header>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @section('js')
    @show
</body>
</html>
