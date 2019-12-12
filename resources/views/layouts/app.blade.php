<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

@stack('head')

<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://kit.fontawesome.com/24fb1f2666.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<div id="app">
    <nav class="navbar fixed-top navbar-expand-md navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Fid-Arc') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ (request()->is('companies/create*')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('companies/create') }}">Create company account</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item {{ (request()->is('login*')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item {{ (request()->is('register*')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item {{ (request()->is('*Profile')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('profile') }}">{{ __('Profile') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               href="{{ route('logout') }}">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
    <footer class="mt-5 pt-5 pb-5 footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xs-12 about-company">
                    <h2>Heading</h2>
                    <p class="pr-5 text-white-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac
                        ante mollis quam tristique convallis </p>
                    <p><a href="#"><i class="fab fa-facebook-square mr-1"></i></a><a href="#"><i class="fab fa-linkedin"></i></a></p>
                </div>
                <div class="col-lg-3 col-xs-12 links">
                    <h4 class="mt-lg-0 mt-sm-3">Links</h4>
                    <ul class="m-0 p-0">
                        <li>- <a href="#">Lorem ipsum</a></li>
                        <li>- <a href="#">Nam mauris velit</a></li>
                        <li>- <a href="#">Etiam vitae mauris</a></li>
                        <li>- <a href="#">Fusce scelerisque</a></li>
                        <li>- <a href="#">Sed faucibus</a></li>
                        <li>- <a href="#">Mauris efficitur nulla</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-xs-12 location">
                    <h4 class="mt-lg-0 mt-sm-4">Location</h4>
                    <p>22, Lorem ipsum dolor, consectetur adipiscing</p>
                    <p class="mb-0"><i class="fa fa-phone mr-3"></i>(541) 754-3010</p>
                    <p><i class="fa fa-envelope-o mr-3"></i>info@hsdf.com</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col copyright">
                    <p class="">
                        <small class="text-white-50">Copyright &copy; 2019, Fid-Arc</small>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API_KEY') }}&callback=initMap" async
        defer></script>
</body>
</html>
