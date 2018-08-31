@extends('front.layouts.app')

@section('metatitle')
<title>Pies {{$animal->name }} @if($animal->homeless == 1)szuka domu!@elseif($animal->homeless == 2)zaginiony!@else psygarnięty ;)@endif</title>
@endsection

@section('metadescription')
<meta name="description" content="{{str_limit($animal->description, 160)}}" />
@endsection

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-lg-12 animal animal-single roundcorners boxshadow">
            <div class="row">
                <div class="col-lg-6">
                    <img class="img img-fluid" src="{{ asset($animal->avatar) }}" alt="{{$animal->name}}">
                </div>
                <div class="col-lg-6">
                    <div class="homeless">
                        @if($animal->homeless == 1)
                        <p class="error"><i class="material-icons home">home</i> Szuka domu!</p>
                        @elseif($animal->homeless == 2)
                        <p class="error"><i class="material-icons new_releases">new_releases</i> Zaginiony!</p>
                        @else
                        <p class="success"><i class="material-icons favorite">favorite</i> Psygarnięty ;)</p>
                        @endif
                    </div>
                    <p class="imie"><i class="material-icons pets">pets</i> {{$animal->name}}, {{$animal->sex}}, {{$animal->age}}
                    @if($animal->age == 1)
                        rok
                    @elseif($animal->age > 1 && $animal->age < 5)
                        lata
                    @else
                        lat
                    @endif
                    </p>
                    
                    <p class="lokalizacja"><i class="material-icons room">room</i> {{$animal->location}}</p>
                    <p class="dodany"><i class="material-icons today">today</i> Dodany {{Carbon\Carbon::parse($animal->added)->diffForHumans()}} przez {{$animal->user->name}}</p>

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
        <div class="col-lg-12 opis pelny">
            {!!$animal->description!!}
        </div>
    </div>
</div>
</div>
</div>
@endsection
