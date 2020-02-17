<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="/css/task-js.css">
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/js/uikit-icons.min.js"></script>
</head>
<body>
    <header>
        <div  class="vh-min-8 uk-background-primary uk-light uk-panel uk-child-width-expand@s uk-text-center uk-grid padding-10">
            <div class="uk-width-1-4">
                <h2 class=" uk-align-left">Test CV Market</h2>
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
            <ul class="uk-flex-center" uk-tab>
                <li class="uk-active"><a href="#">Right</a></li>
                <li><a href="#">Item</a></li>
                <li><a href="#">Item</a></li>
            </ul>
            </div>
        </div>
    </header>

    <main>
        <div class="vh-min-84">
            <div class="uk-grid-collapse uk-child-width-expand@s uk-text-center uk-grid div-height-100 margin-0">
                <div>
                    <div class="uk-background-muted uk-padding">Item</div>
                </div>
                <div>
                    <div class="uk-background-primary uk-padding uk-light">Item</div>
                </div>
                <div>
                    <div class="uk-background-secondary uk-padding uk-light">Item</div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div  class="vh-min-8 uk-background-primary uk-light uk-panel padding-10">
            <div class="uk-width-1-4 uk-align-center">
                <h2 class=" uk-align-left">Test CV Market 2020 footer</h2>
            </div>
        </div>
    </footer>

</body>
</html>

