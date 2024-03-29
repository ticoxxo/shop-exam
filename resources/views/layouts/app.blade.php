<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Shop para trabajo remoto') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

</head>

<body>

    <div id="app">
       
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">

            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">

                   Online Shop

                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto"></ul>


                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto">
                    
                    <a class="btn btn-outline-primary btn-sm ml-3" href="{{route('cart.checkout')}}">
                    <i class="fa fa-shopping-cart"></i> Cart Total Qty 
                    <span class="badge badge-light">{{Cart::getTotalQuantity()}}</span>
                    </a> 
                        <!-- Authentication Links -->

                        @guest

                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>

                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>

                        @else

                            <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>

                            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>

                            <li><a class="nav-link" href="{{ route('products.index') }}">Manage Product</a></li>

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    {{ Auth::user()->name }} <span class="caret"></span>

                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

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

            <div class="container">

            @yield('content')
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            </div>

        </main>

    </div>

</body>

</html>