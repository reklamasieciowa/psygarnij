<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark grey darken-4">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="{{ url('/') }}">Psygarnij</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto nav-fill">
        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Adopcje</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('zaginione') }}">Zaginione</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('psygarniete') }}">Psygarnięte</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pagenews') }}">Aktualności</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pageshow', ['pomoc']) }}">Pomoc</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pageshow', ['o-nas']) }}">O nas</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pageshow', ['kontakt']) }}">Kontakt</a></li>

        @if (Gate::allows('isadmin'))
        <li class="divider">|</li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dodaj
            </a>

            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('animalcreate')}}">Zwierzaka</a>
                    <a class="dropdown-item" href="{{route('pagecreate')}}">Newsa/Stronę</a>
                    <a class="dropdown-item" href="#">Admina</a>
            </div>
        </li>
        <li class="nav-item float-right"><a href="{{ route('admin.index') }}" class="nav-link">Admin panel</a></li>
        @endif

        <!-- Authentication Links -->
        @if (Auth::guest())
        <li class="divider">|</li>
        <li class="float-right"><a class="nav-link" href="{{ route('login') }}">Zaloguj</a></li>
        <li class="float-right"><a class="nav-link" href="{{ route('register') }}">Załóż konto</a></li>
        @else

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownUser">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Wyloguj
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
        </div>
    </li>
    @endif

      <!-- Dropdown -->
<!--       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->

    </ul>
   

  @include('front.layouts.search')
  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->


