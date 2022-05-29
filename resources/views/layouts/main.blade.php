<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $route . ': FILMOPO?' }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{asset('icon_filmOpo.PNG')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Document</title>

    <style>
        #logout {
            position: absolute;
            width: 100%;
            background: #063;
            bottom: 0px;
            margin: 10px 0px 10px;
        }
    </style>

</head>

<body>
    <header class="fixed-top">
        <nav class="navbar" style="background-color: #ECB365;">
            <div class="container-fluid">
                <a class="navbar-brand ms-3" href="{{ route('home') }}" style="font-weight: 900; color: red; font-size: 1.8rem; font-family: 'Bebas Neue', cursive;">
                    <spin>FILM</spin>
                    <spin style="color:white; background-color: red; padding:0.025em; margin-left: 0.075em; box-sizing: border-box;">OPO</spin>
                </a>
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
                    <div class=" offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                @if ($route == 'movies')
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('watchlist') }}" style="font-size: 1.4rem; color: white;">Watchlists</a>
                                </li>
                                @endif
                            </ul>
                    </div>

                    <div id="manipulate nav-item" align="center" style=" padding: 20px 0 20px;">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <input class="btn btn-danger" type="submit" value="Logout">
                        </form>
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