<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/mdb.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body class="admin">
    <div id="app" class="container-fluid">

        @include('admin.layouts.nav')

       <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.layouts.flash')
                @include('admin.layouts.errors')
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
 <!-- MDB -->
  <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
@yield('footerScripts')
</body>
</html>
