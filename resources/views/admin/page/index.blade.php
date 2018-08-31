@extends('admin.layouts.app')

@section('css')
  @include('admin.layouts.datatablesheader')
@endsection

@section('content')
<div class="container content">
  <div class="row">
    <div class="col-lg-12">
      <h1>Strony/Newsy
      <a class="btn-add" href="{{route('pagecreate')}}"><i class="material-icons">add_circle</i></a>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-striped table-hover datatables">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tytuł</th>
            <th scope="col">News</th>
            <th scope="col">Edytuj</th>
            <th scope="col">Usuń</th>
            <th scope="col"><i class="material-icons today">today</i> Aktualizacja</th>
          </tr>
        </thead>


        <tbody>
          @foreach($pages as $page)
          <tr>
            <th scope="row">{{ $page->id }}</th>
            <td>{{ $page->title }}</td>
            <td>
              @if($page->news == 1)
                <i class="material-icons">check</i>
              @else
                <i class="material-icons">close</i>
              @endif
            </td>


            <td><a href="{{route('pageedit', $page->slug)}}"><button class="btn btn-primary btn-sm"><i class="material-icons">create</i></button></a>
            </td>
            <td><button class="btn btn-danger btn-sm usun" data-toggle="modal" data-target="#modalusun-{{$page->id}}"><i class="material-icons">delete_sweep</i></button>
              <div class="modal fade" tabindex="-1" role="dialog" id="modalusun-{{$page->id}}">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h4 class="modal-title">Czy na pewno usunąć {{$page->title}}?</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>

                    </div>

                    <div class="modal-body">
                      <form method="POST" action="{{route('pagedestroy', $page->slug)}}">
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
            </td>
            <td>
              {{ $page->updated_at }}
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