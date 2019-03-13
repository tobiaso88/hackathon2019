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
        <ul>
            <li>
                <a href="/">/</a>
            </li>
            <li>
                <a href="/top100">Top 100 names</a>
            </li>
            <li>
                <a href="/most-given-name">Most given name</a>
            </li>
        </ul>
        @yield('content')
    </div>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/search.js"></script>
</body>
</html>
