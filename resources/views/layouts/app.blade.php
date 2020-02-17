<!doctype html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="/css/task-js.css">
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/js/uikit-icons.min.js"></script>

</head>
<body>
    <div id="app">
        <header>
            <div  class="vh-min-6 uk-background-primary uk-light uk-panel uk-child-width-expand@s uk-text-center uk-grid padding-10">
                <div class="uk-width-1-4">
                    <h2 class=" uk-align-left">
                         <a href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </h2>
                </div>
                <div class="uk-width-1-2">
                    <div class="uk-align-left uk-margin">
                        <form class="uk-search uk-search-default">
                            <a href="" uk-search-icon></a>
                            <input class="uk-search-input" type="search" placeholder="Search...">
                        </form>
                    </div>
                </div>
                <div class="uk-width-1-4">
                    <ul class="ul-menu">
                        @guest
                            <li class="ul-menu">
                                <a class="{{ (request()->is('login')) ? 'active' : '' }}" 
                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="ul-menu">
                                    <a class="{{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="ul-menu">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>                    
                </div>
            </div>
        </header>

        <main class="py-4">
            <div class="vh-min-80">
                @yield('content')
            </div>    
        </main>

    </div>
    <footer>
        <div  class="vh-min-4 uk-background-primary uk-light uk-panel padding-10">
            <div class="uk-width-1-4 uk-align-center">
                <h2 class=" uk-align-left">Test CV Market 2020 footer</h2>
            </div>
        </div>
    </footer>
</body>
</html>
