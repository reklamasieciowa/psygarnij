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

            <!-- Card -->
            <div class="card animal">

              <!-- Card image -->
              <div class="view overlay">
                <a href="{{route('animal', $animal->id)}}" title="{{$animal->name}}, {{$animal->sex}}, {{$animal->age}} @if($animal->age == 1) rok @elseif($animal->age > 1 && $animal->age < 5) lata @else lat @endif - {{config('app.name') }}">
                    <img class="card-img-top" src="{{ asset($animal->avatar) }}" alt="{{$animal->name}}" title="{{$animal->name}}">
                    <div class="mask rgba-white-slight"></div>
                </a>
          </div>

          <!-- Card content -->
          <div class="card-body">

            <!-- Title -->
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
        <!-- Text -->
        <p class="card-text">

                @if($animal->status == 1)
                <p><i class="material-icons home">home</i> Szuka domu. <a href="#">Psygarnij go!</a> </p>
                @elseif($animal->status == 2)
                <p><i class="material-icons new_releases">new_releases</i> Zaginiony!</p>
                @else
                <p><i class="material-icons favorite">favorite</i> Psygarnięty ;)</p>
                @endif

                <p><i class="material-icons today">today</i> Dodany {{Carbon\Carbon::parse($animal->added)->diffForHumans()}}<p>
                <p><i class="material-icons room">room</i> {{$animal->location}}</p>

        </p>
        <!-- Button -->
        @if (Auth::check() && Gate::allows('isadmin'))



                <a href="{{route('animaledit', $animal->id)}}"><button class="btn btn-primary">Edytuj</button></a>
                <button class="btn btn-danger usun" data-toggle="modal" data-target="#modalusun-{{$animal->id}}">Usuń</button>




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


@endif

</div>

</div>
<!-- Card -->


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
