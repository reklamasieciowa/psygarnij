@extends('admin.layouts.app')

@section('css')
  @include('admin.layouts.datatablesheader')
@endsection

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-lg-12">
            <h1>Użytkownicy
              <a class="btn-add" href="{{route('usercreate')}}"><i class="material-icons">add_circle</i></a>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-hover datatables">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nazwa</th>
                  <th scope="col">email</th>
                  <th scope="col">Newsletter</th>
                  <th scope="col"><i class="material-icons today">today</i></th>
                  <th scope="col">Edytuj</th>
                  <th scope="col">Usuń</th>
              </tr>
          </thead>


          <tbody>
            @foreach($users as $user)
            <tr
            @if($user->hasRole(1))
              class="marked"
            @endif
            >
              <th scope="row">{{ $user->id }}</th>
              <td>{{ $user->name }} 
                @if($user->hasRole(1))
                  (admin)
                @endif
              </td>
              <td>{{$user->email}}</td>
              <td>
                @if($user->newsletter == 1)
                  <i class="material-icons success">check</i>
                @else
                  <i class="material-icons">close</i>
                @endif
              </td>
            <td>{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
            <td><a href="{{route('animaledit', $user->id)}}"><button class="btn btn-primary btn-sm"><i class="material-icons">create</i></button></a>
            </td>
            <td>
            @if(Auth::user()->id !== $user->id)
              <button class="btn btn-danger usun btn-sm" data-toggle="modal" data-target="#modalusun-{{$user->id}}"><i class="material-icons">delete_sweep</i></button>
              <div class="modal fade" tabindex="-1" role="dialog" id="modalusun-{{$user->id}}">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title">Czy na pewno usunąć {{$user->name}}?</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                      </div>

                      <div class="modal-body">
                          <form method="POST" action="{{route('animaldestroy', $user->id)}}">
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
          </div><!-- /.modal -->
        @endif
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

</div>
</div>
@endsection

  @section('footerScripts')
    @include('admin.layouts.datatablesfooter')
  @endsection
