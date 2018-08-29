<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body class="admin">
    <div id="app" class="container-fluid">

        @include('admin.layouts.nav')

       <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('layouts.flash')
                @include('layouts.errors')
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div id="credentials" class="col-lg-12">
        @include('admin.layouts.footer')
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('footerScripts')
</body>
</html>
