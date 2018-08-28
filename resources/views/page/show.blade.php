@extends('layouts.app')

@section('metatitle')
    <title>{{$page->title}}</title>
@endsection

@section('metadescription')
    <meta name="description" content="{{$page->metadescription}}" />
@endsection

@section('content')
<div class="container content">
    <div class="row">
                <div class="col-lg-12 page boxshadow roundcorners">
                    <div class="col-lg-12 page-title">
                        <h2>{{$page->title}}</h2>
                    </div>

                    <div class="col-lg-12 page-body">
                        {!! $page->body !!}
                    </div>

                    @if (Auth::check() && Gate::allows('isadmin'))
                    <div class="col-lg-12">
                        <div class="admin-btn">
                                <hr />
                                <p>
                                <a href="{{route('pageedit', $page->slug)}}"><button class="btn btn-primary">Edytuj</button></a>
                                <button class="btn btn-danger usun" data-toggle="modal" data-target="#modalusun-{{$page->id}}">Usuń</button>
                                </p>

                               <div class="modal fade" tabindex="-1" role="dialog" id="modalusun-{{$page->id}}">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                                        <h4 class="modal-title">Czy na pewno usunąć {{$page->title}}?</h4>
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
                        </div>
                    </div>
                    @endif
                </div>
    </div>
</div>
@endsection
