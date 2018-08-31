<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('metatitle')
    @yield('metadescription')
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app" class="container-fluid">
        @include('front.layouts.nav')

        <div class="container beforecontent">
            <div class="row">
                <div class="col-lg-12">
                    @include('front.layouts.flash')
                    @include('front.layouts.errors')
                </div>
            </div>
        </div>

        @yield('content')
    </div>
    <footer>
        @include('front.layouts.nav')
        
        <div id="credentials" class="col-lg-12">
         @include('front.layouts.footer')
     </div>

 </footer>

 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}"></script>
 @yield('footerscripts')
</body>
</html>
