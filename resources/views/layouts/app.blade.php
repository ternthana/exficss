<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <svg width="132px" height="50px" viewBox="0 0 132 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Desktop-HD" transform="translate(-654.000000, -487.000000)">
                                <image id="Bitmap" x="654" y="487" width="133" height="50" xlink:href="data:image/png;base64,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"></image>
                            </g>
                        </g>
                    </svg>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
