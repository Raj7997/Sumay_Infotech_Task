<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('assets/css/toastr/toastr.min.css')}}">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    <!-- jQuery -->
        <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <!-- Toastr -->
        <script src="{{ asset('assets/js/toastr/toastr.min.js')}}"></script>
    <!-- Session Flash Message -->
        @if(Session::has('success'))
        <script>
            Command: toastr["success"]('<?php echo Session::get('success') ?>')
        </script>
        @endif
        @if(Session::has('error'))
        <script>
            Command: toastr["error"]('<?php echo Session::get('error') ?>')
        </script>
        @endif
        @if(Session::has('warning'))
        <script>
            Command: toastr["warning"]('<?php echo Session::get('warning') ?>')
        </script>
        @endif
        @if(Session::has('info'))
        <script>
            Command: toastr["info"]('<?php echo Session::get('info') ?>')
        </script>
        @endif
        <!-- Parsley -->
        <script>
            window.ParsleyConfig = {
                errorsWrapper: '<div></div>',
                errorTemplate: '<span class="errmsg parsley"></span>',
                errorClass: 'has-error',
                successClass: 'has-success'
            };
        </script>
        <script src="{{ asset('assets/js/parsley/parsley.min.js')}}"></script>
</body>
</html>
