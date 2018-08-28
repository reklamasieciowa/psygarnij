@extends('admin.layouts.app')

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-lg-12">
            <h1>Zwierzaki</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Info</th>
                  <th scope="col"><i class="material-icons room">room</i></th>
                  <th scope="col">Status</th>
                  <th scope="col"><i class="material-icons today">today</i></th>
                  <th scope="col">Zweryfikuj</th>
                  <th scope="col">Edytuj</th>
                  <th scope="col">Usuń</th>
              </tr>
          </thead>


          <tbody>
            @foreach($animals as $animal)
            <tr>
              <th scope="row">{{ $animal->id }}</th>
              <td><img src="{{asset($animal->avatar)}}" width="100px;"></td>
              <td>{{ $animal->name }}, {{ $animal->sex }}, {{ $animal->age }} lat</td>
              <td>{{$animal->location}}</td>
              <td>@if($animal->homeless == 1)
                <i class="material-icons home">home</i>
                @elseif($animal->homeless == 2)
                <i class="material-icons new_releases">new_releases</i>
                @else
                <i class="material-icons favorite">favorite</i>
            @endif</td>
            <td>{{Carbon\Carbon::parse($animal->added)->diffForHumans()}}</td>
            <td>
            <a href="{{route('animalverify', $animal->id)}}">
              
                @if($animal->verified == 1)
                  <button class="btn btn-success btn-sm">
                    <i class="material-icons" title="Cofnij weryfikację">verified_user</i>
                  </button>
                @else
                  <button class="btn btn-danger btn-sm">
                    <i class="material-icons" title="Zweryfikuj">remove_circle</i>
                  </button>
                @endif
             </a>
            </td>
            <td><a href="{{route('animaledit', $animal->id)}}"><button class="btn btn-primary btn-sm"><i class="material-icons">create</i></button></a>
            </td>
            <td><button class="btn btn-danger usun btn-sm" data-toggle="modal" data-target="#modalusun-{{$animal->id}}"><i class="material-icons">delete_sweep</i></button>
            <div class="modal fade" tabindex="-1" role="dialog" id="modalusun-{{$animal->id}}">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h4 class="modal-title">Czy na pewno usunąć {{$animal->name}}?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{route('animaldestroy', $animal->id)}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger btn-lg">Usuń</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Anuluj</button>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <p class="text-muted">Operacja jest nieodwracalna.</p>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal --></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

</div>
</div>
@endsection