<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <!-- CSS -->
    <link rel="stylesheet" href="/css/app.css" type="text/css" media="screen"/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <script
        src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>

</head>

<body>

<div class="wrapper">

    <section class="heading">
        <h1>Noogle</h1>
        <h2>Name search made <span>'replace this'</span></h2>
    </section>


    <section class="answers">
        <div class="flex-row space-between">
            <div class="q">How many Josephine were born in 1914?</div>
            <div class="a">X</div>
        </div>
        <div class="flex-row space-between">
            <div class="q">Which name was the most given in 1928?</div>
            <div class="a">X</div>
        </div>
        <div class="flex-row space-between">
            <div class="q">How many Peter were born in Texas?</div>
            <div class="a">X</div>
        </div>
        <div class="flex-row space-between">
            <div class="q">Which name wwas the most given in Texas?</div>
            <div class="a">X</div>
        </div>
        <div class="flex-row space-between">
            <div class="q">How many Mary were born in 1939 in Colorado?</div>
            <div class="a">X</div>
        </div>
        <div class="flex-row space-between">
            <div class="q">Which name was the most given in 1945 in Virginia?</div>
            <div class="a">X</div>
        </div>
        <div class="flex-row space-between">
            <div class="q">Was there more Monica born in 1999 than in 1969?</div>
            <div class="a">X</div>
        </div>
        <div class="flex-row space-between">
            <div class="q">Was there more Ted born in Hawaii than in Alaska?</div>
            <div class="a">X</div>
        </div>
        <div class="flex-row space-between">
            <div class="q">Was there more John born in Vermont in 1970 than in Maine in 1975?</div>
            <div class="a">X</div>
        </div>
        <div class="flex-row space-between">
            <div class="q">Which name was the most given?</div>
            <div class="a">X</div>
        </div>
    </section>

    <section class="search">

        <label for="name">Name</label>
        <input type="text" name="name">

        <label for="year">Name</label>
        <input type="text" name="year">

        <label for="state">Name</label>
        <input type="text" name="state">


    </section>


    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

            <div class="links">
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
    </div>
</div>
</body>

<footer>

</footer>


<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/search.js"></script>
</html>
