        
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ url('/') }}">Psygarnij</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse d-flex justify-content-around nav-fill" id="navbarSupportedContent">
    <ul class="navbar-nav navbar-expand-lg">
        <li class="nav-item"><a class="nav-link" href="#">Dodaj</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{route('animalcreate')}}">Zwierzaka</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('pagecreate')}}">Newsa/Stronę</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Admina</a></li>
        <li class="nav-item">
            <a class="nav-link"href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Wyloguj
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>


</ul>

</div>
</nav>