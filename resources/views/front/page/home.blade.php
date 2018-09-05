@extends('front.layouts.app')

@section('metatitle')
<title>Nie kupuj, Psygarnij! - {{ $siteSettings->app_name }}</title>
@endsection

@section('metadescription')
<meta name="description" content="Nie kupuj, Psygarnij!" />
@endsection

@section('content')
<div class="container content">
    <div class="row">
        @php
        $count = $animals->total();
        @endphp

        @if($count == 0)
        <div class="col-lg-12">
            <p class="alert alert-info">Aktualnie nie ma zwierzaków.</p>
        </div>
        @else
        <div class="col-lg-12">
            <p class="alert alert-info">
                Aktualnie: 

                @if($count == 1)
                {{$count}} zwierzak.
                @elseif($count > 1 && $count < 5)
                {{$count}} zwierzaki.
                @else
                {{$count}} zwierzaków.
                @endif
                <a href="{{ route('pageshow', ['pomoc']) }}">Zobacz jak możesz im pomóc!</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="card-columns">
            @foreach($animals as $animal)

            <div class="card animal roundcorners boxshadow">
            <a href="{{route('animal', $animal->id)}}" title="{{$animal->name}}, {{$animal->sex}}, {{$animal->age}} @if($animal->age == 1) rok @elseif($animal->age > 1 && $animal->age < 5) lata @else lat @endif - {{config('app.name') }}">
                    <img class="img img-fluid card-img-top" src="{{ asset($animal->avatar) }}" alt="{{$animal->name}}" alt="{{$animal->name}}">
            </a>
            @if($animal->verified == 1)
                <i class="material-icons verified" title="Zweryfikowane">verified_user</i>
            @endif
              <div class="card-body">
                <h3 class="card-title">
                   <a href="{{route('animal', $animal->id)}}" alt="{{$animal->name}} - {{config('app.name') }}" title="{{$animal->name}} - {{config('app.name') }}"> <i class="material-icons pets">pets</i> {{$animal->name}}, {{$animal->sex}}, 
                    {{$animal->age}} 
                    @if($animal->age == 1)
                        rok
                    @elseif($animal->age > 1 && $animal->age < 5)
                        lata
                    @else
                        lat
                    @endif
                   </a>
                </h3>
                <!-- <div class="card-text zajawka opis">{{ str_limit(strip_tags($animal->description), 70) }}</div>
                <a class="btn btn-primary" href="{{route('animal', $animal->id)}}">Zobacz</a> -->
            </div>
            
            <ul class="list-group list-group-flush homeless">
                @if($animal->homeless == 1)
                <li class="list-group-item error"><i class="material-icons home">home</i> Szuka domu. <a href="#">Psygarnij go!</a> </li>
                @elseif($animal->homeless == 2)
                <li class="list-group-item error"><i class="material-icons new_releases">new_releases</i> Zaginiony!</li>
                @else
                <li class="list-group-item success"><i class="material-icons favorite">favorite</i> Psygarnięty ;)</li>
                @endif

                <li class="list-group-item dodany"><i class="material-icons today">today</i> Dodany {{Carbon\Carbon::parse($animal->added)->diffForHumans()}}</li>
                <li class="list-group-item lokalizacja"><i class="material-icons room">room</i> {{$animal->location}}</li>
            </ul>
            
            @if (Auth::check() && Gate::allows('isadmin'))
            <ul class="list-group list-group-flush admin-btn">

                <li class="list-group-item error">
                    <a href="{{route('animaledit', $animal->id)}}"><button class="btn btn-primary">Edytuj</button></a>
                    <button class="btn btn-danger usun" data-toggle="modal" data-target="#modalusun-{{$animal->id}}">Usuń</button>
                </li>

                

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
        </div><!-- /.modal -->

    </ul>
    @endif

</div>



@endforeach
</div>
</div>  

@endif

<div class="row">
    <div class="col-lg-12">
        {{ $animals->links() }}
    </div>
</div>
</div>
@endsection