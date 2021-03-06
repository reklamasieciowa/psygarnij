@extends('admin.layouts.app')

@section('content')
<div class="content">
  <div class="row">
    <div class="col-lg-12 page-title">
      <h1>Admin panel</h1>
    </div>
  </div>

    <div class="card-columns">
      <div class="card text-center">
        <i class="fa fa-paw" aria-hidden="true"></i>
        <div class="card-body">
          <h3 class="card-title">Zwierzaki</h3>
          <p class="card-text">Zarządzaj zwierzakami</p>
        </div>
        <ul class="list-group list-group-flush homeless">
          <a href="{{ route('admin.animals') }}"><li class="list-group-item"><i class="fa fa-eye" aria-hidden="true"></i> Przeglądaj</li></a>
          <a href="{{ route('animalcreate') }}"><li class="list-group-item"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj</li></a>
        </ul>
      </div>
      <div class="card text-center">
        <i class="fa fa-sticky-note" aria-hidden="true"></i>
        <div class="card-body">
          <h3 class="card-title">Strony/Newsy</h3>
          <p class="card-text">Zarządzaj stronami i newsami</p>
        </div>
        <ul class="list-group list-group-flush homeless">
          <a href="{{ route('admin.pages') }}"><li class="list-group-item"><i class="fa fa-eye" aria-hidden="true"></i> Przeglądaj</li></a>
          <a href="{{ route('pagecreate') }}"><li class="list-group-item"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj</li></a>
        </ul>
      </div>
            <div class="card text-center">
       <i class="fa fa-group" aria-hidden="true"></i>
        <div class="card-body">
          <h3 class="card-title">Użytkownicy</h3>
          <p class="card-text">Zarządzaj użytkownikami</p>
        </div>
        <ul class="list-group list-group-flush homeless">
          <a href="{{ route('admin.users') }}"><li class="list-group-item"><i class="fa fa-eye" aria-hidden="true"></i> Przeglądaj</li></a>
          <a href="{{ route('usercreate') }}"><li class="list-group-item"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj</li></a>
        </ul>
      </div>
      <div class="card text-center">
        <i class="fa fa-gears" aria-hidden="true"></i>
        <div class="card-body">
          <h3 class="card-title">Ustawienia</h3>
          <p class="card-text">Zarządzaj ustawieniami</p>
        </div>
        <ul class="list-group list-group-flush homeless">
          <a href="{{ route('settingsedit') }}"><li class="list-group-item"><i class="fa fa-pencil" aria-hidden="true"></i> Edytuj</li></a>
        </ul>
      </div>
    </div>


</div>
@endsection
