<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style>

        .profile-image{
            max-width: 50px;
            border: 4px solid #fff;
            border-radius: 100%;
            box-shadow: 0 2px 2px rgba(0,0,0,0.3);
            margin-bottom: 5px;
        }

        .in  #search-form {
            display: inline-flex;
            margin: 0 auto;
            width: 100%;
        }

        .in #search-submit {
            margin-left: 5px !important;
        }

        .in > ul {
            float: none !important;
            display: inline-table;
        }
        
        .in {
            text-align: center;
        }

        .in li {
            display: inline;
        }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <form id="search-form" class="navbar-form pull-left" action="/search" method="POST">
                        {{ csrf_field() }}
                        <input class="form-control" type="text" name="search" placeholder="Search...">
                        <button id="search-submit" class="btn" type="submit">Search</button>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right pull-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <img class="profile-image" src="/uploads/avatars/{{ Auth::user()->avatar }}">
                                <a href="#" class="dropdown-toggle" style="display: inline;" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="/home">Home</a>
                                    </li>
                                    <li>
                                        <a href="/profile/{{ Auth::user()->username }}"> Profile </a>
                                    </li>
                                    <hr>
                                    <li>
                                        <a href="/articles/create">Create article</a>
                                    </li>
                                    <li>
                                        <a href="/articles">Feed</a>
                                    </li>

                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
