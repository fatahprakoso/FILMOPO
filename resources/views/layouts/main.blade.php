<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $route . ': FILMOPO?' }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>Document</title>
</head>

<body>
    <header class="fixed-top">
        <nav class="navbar" style="background-color: #ECB365;">
            <div class="container-fluid">
                <a class="navbar-brand ms-3" href="{{ route('home') }}" style="font-weight: 900; color: #000; font-size: 1.75rem; letter-spacing: 0.6vw; font-family: 'Bebas Neue', cursive;"> <spin>FILM</spin><spin style="color: red;">OPO</spin> </a>
                <form role="search" onsubmit="event.preventDefault();">
                    @csrf
                    <input required class=" form-control me-2 input-search" type="search" name="search" placeholder="Interstellar, Hereditary, La La Land, ..." aria-label="Search" style="width: 32.75vw" />
                    <script>
                        document.querySelector('.input-search').addEventListener('keyup', function(e) {
                            if (e.keyCode === 13) {
                                window.location.href = `/search/${this.value}`;
                            }
                        });
                    </script>
                </form>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" style="background-color: #041C32;" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="font-size: 2.6rem; color: white; font-weight: 900;">Menu</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close""></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            @if ($route == 'movies')
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('watchlist') }}" style="font-size: 1.4rem; color: white;">Watchlists</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="background"></div>

    <style>
        body {
            background-color: #041C32;
        }
    </style>

    @yield('app')
</body>

</html>