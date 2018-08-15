@extends('layouts.app')

@section('metatitle')
    <title>Pies {{$animal->name }} @if($animal->homeless == 1)szuka domu!@elseif($animal->homeless == 2)zaginiony!@else psygarnięty ;)@endif</title>
@endsection

@section('metadescription')
    <meta name="description" content="{{str_limit($animal->description, 160)}}" />
@endsection

@section('content')
<div class="container content">
    <div class="row">
                <div class="col-lg-12 animal">
                        <div class="col-lg-6">
                            <img class="img img-responsive" src="{{asset($animal->avatar)}}" alt="{{$animal->name}}">
                            <div class="homeless">
                                @if($animal->homeless == 1)
                                    <p class="error">Szuka domu!</p>
                                @elseif($animal->homeless == 2)
                                    <p class="error">Zaginiony!</p>
                                @else
                                    <p class="success">Psygarnięty ;)</p>
                                @endif
                            </div>
                        </div>
                    <div class="col-lg-6">
                        <!-- <p>{{$animal->animaltype->name}}</p> -->
                        <p class="imie">{{$animal->name}}</p>
                        <p class="plec">{{$animal->sex}}</p>
                        <p class="wiek">Wiek: {{$animal->age}} lat</p>
                        <p class="opis">{{$animal->description}}</p>
                        <p class="dodany">Dodany: {{Carbon\Carbon::parse($animal->added)->diffForHumans()}} przez {{$animal->user->name}}</p>
                        <p>
                            <button class="btn btn-primary"><a href="{{route('pageshow', ['page' => 'pomoc'])}}">Pomóż</a></button>
                            @if($animal->homeless == 1)
                                <button class="btn btn-success">Psygarnij</button>
                            @endif
                        </p>
                       @if (Auth::check() && Gate::allows('editanimal', $animal))
                            <div class="admin-btn">
                                <hr />
                                <p>
                                <a href="{{route('animaledit', $animal->id)}}"><button class="btn btn-primary">Edytuj</button></a>
                                <button class="btn btn-danger usun" data-toggle="modal" data-target="#modalusun-{{$animal->id}}">Usuń</button>
                                </p>

                               <div class="modal fade" tabindex="-1" role="dialog" id="modalusun-{{$animal->id}}">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                                        <h4 class="modal-title">Czy na pewno usunąć {{$animal->name}}?</h4>
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
                                </div><!-- /.modal -->

                            </div>
                        @endif
                    </div>
                </div>
    </div>
</div>
@endsection