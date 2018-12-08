<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ url('/') }}">{{ $siteSettings->app_name }}</a>  <a class="navbar-brand" href=" {{ route('admin.index') }} ">Admin home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse d-flex justify-content-around " id="navbarSupportedContent">
    <ul class="navbar-nav">
<!--         <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Adopcje</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('zaginione') }}">Zaginione</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('psygarniete') }}">Psygarnięte</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pagenews') }}">Aktualności</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pageshow', ['pomoc']) }}">Pomoc</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pageshow', ['o-nas']) }}">O nas</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pageshow', ['kontakt']) }}">Kontakt</a></li> -->
        
        <li class="nav-item dropdown float-right">
            <a class="nav-link dropdown-toggle icon" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fa fa-plus" aria-hidden="true"></i> <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="{{route('animalcreate')}}">Zwierzaka</a>
                    <a class="dropdown-item" href="{{route('pagecreate')}}">Newsa/Stronę</a>
                    <a class="dropdown-item" href="{{route('usercreate')}}">Użytkownika</a>
                </li>
            </ul>
        </li>
        
        <li class="divider">|</li>

        <li class="nav-item"><a class="nav-link" href="{{ route('admin.animals') }}">Zwierzaki</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.pages') }}">Strony</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.users') }}">Użytkownicy</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.users') }}">Newsletter</a></li>

        <li class="divider">|</li>

        <li class="nav-item"><a class="nav-link" href="{{ route('settingsedit') }}">Ustawienia</a></li>

         <li class="divider">|</li>

        <li class="nav-item dropdown float-right">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Wyloguj
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
   
</ul>


</div>
</nav>