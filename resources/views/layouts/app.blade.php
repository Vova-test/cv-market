<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

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
        <header class="header-fixed">
            <div  class="uk-background-primary uk-light uk-panel uk-child-width-expand@s uk-text-center uk-grid padding-10">
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
                        @can('create', 'App\Models\CV')
                            <li class="ul-menu">
                                <a class="ahover {{ (request()->is('showCreatePage')) ? 'active' : '' }}" href="{{ route('showCreatePage') }}">
                                    Add CV
                                </a>
                            </li>
                        @endcan
                        <li class="ul-menu">
                            <a class="ahover {{ (request()->is('home')) ? 'active' : '' }}" 
                                href="{{ route('home') }}">Main</a>
                        </li>
                        @guest
                            <li class="ul-menu">
                                <a class="ahover {{ (request()->is('login')) ? 'active' : '' }}" 
                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="ul-menu">
                                    <a class="ahover {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="ul-menu">
                                <a class="ahover" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

        <main class="main-maggin">
            <div>
                @yield('content')
            </div>    
        </main>

    </div>
    <footer">
        <div  class="uk-background-primary uk-light uk-text-center">
            <a>Test CV Market 2020 footer</a>
        </div>
    </footer>
</body>
</html>
