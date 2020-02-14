<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/js/uikit-icons.min.js"></script>
</head>
<body>
    <header >
        <div>
            <p>Test CV Market Layout header</p>
            @guest
               
            @else
                
            @endguest
        </div>    
    </header>

    <main>
        <p>Main Layout content</p>
        @yield('content')
    </main>

    <footer>
        <div >
            <p>Test CV Market 2020 footer</p>
        </div>
    </footer>

</body>
</html>

