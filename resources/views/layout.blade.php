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
            <h2>Name search made <span id="replace-title">smart</span></h2>
        </section>
        <nav class="navbar navbar-expand-lg navbar-light bg-lig ht">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/top100" class="nav-link">Top 100 names</a>
                    </li>
                    <li class="nav-item">
                        <a href="/most-given-name" class="nav-link">Most given name</a>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/search.js"></script>
</body>
</html>
