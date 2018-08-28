@extends('admin.layouts.app')

@section('content')
<div class="content">
  <div class="row">
    <div class="col-lg-12">
      <h1>Admin panel</h1>
    </div>
  </div>

    <div class="card-columns">
      <div class="card text-center">
        <i class="material-icons icon--admin-dashboard">pets</i>
        <div class="card-body">
          <h3 class="card-title">Zwierzaki</h3>
          <p class="card-text">Zarządzaj zwierzakami</p>
        </div>
        <ul class="list-group list-group-flush homeless">
          <a href="{{ route('admin.animals') }}"><li class="list-group-item"><i class="material-icons">find_in_page</i> Przeglądaj</li></a>
          <a href="{{ route('animalcreate') }}"><li class="list-group-item"><i class="material-icons success">add_box</i> Dodaj</li></a>
        </ul>
      </div>
      <div class="card text-center">
        <i class="material-icons icon--admin-dashboard">chrome_reader_mode</i>
        <div class="card-body">
          <h3 class="card-title">Strony/Newsy</h3>
          <p class="card-text">Zarządzaj stronami i newsami</p>
        </div>
        <ul class="list-group list-group-flush homeless">
          <a href="{{ route('admin.pages') }}"><li class="list-group-item"><i class="material-icons">find_in_page</i> Przeglądaj</li></a>
          <a href="{{ route('pagecreate') }}"><li class="list-group-item"><i class="material-icons success">add_box</i> Dodaj</li></a>
        </ul>
      </div>
            <div class="card text-center">
        <i class="material-icons icon--admin-dashboard">face</i>
        <div class="card-body">
          <h3 class="card-title">Użytkownicy</h3>
          <p class="card-text">Zarządzaj użytkownikami</p>
        </div>
        <ul class="list-group list-group-flush homeless">
          <a href="#"><li class="list-group-item"><i class="material-icons">find_in_page</i> Przeglądaj</li></a>
          <a href="#"><li class="list-group-item"><i class="material-icons success">add_box</i> Dodaj</li></a>
        </ul>
      </div>
      <div class="card text-center">
        <i class="material-icons icon--admin-dashboard">settings</i>
        <div class="card-body">
          <h3 class="card-title">Ustawienia</h3>
          <p class="card-text">Zarządzaj ustawieniami</p>
        </div>
        <ul class="list-group list-group-flush homeless">
          <a href="#"><li class="list-group-item"><i class="material-icons">create</i> Edytuj</li></a>
        </ul>
      </div>
    </div>


</div>
@endsection
