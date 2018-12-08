@extends('front.layouts.app')

@section('metatitle')
    <title>Szefie, nie ma takiej strony... :(</title>
@endsection

@section('content')
<div class="container content boxshadow roundcorners">
    <div class="row">
        <div class="col-lg-12 page boxshadow roundcorners text-center">
            <div class="col-lg-12 page-title">
                <h3>Szefie, nie ma takiej strony...</h3>

                <img style="margin: 20px 0;" src="https://media.giphy.com/media/XFB2oHy8YKWs0/giphy.gif" alt="Strona nie istnieje">
                
            </div>
            <div class="col-lg-12">
             <a href=" {{ route('home')}} "><button class="btn btn-info btn-lg">Lepiej wróć na home</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
