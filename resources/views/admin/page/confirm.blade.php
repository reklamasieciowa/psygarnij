@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
                <div class="col-lg-12 alert alert-danger">
                    
                    <h2>Czy na pewno usunąć {{$page->title}}?</h2>

                    <form method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                    
                    <button type="submit" class="btn btn-danger btn-lg">Usuń</button>
                    </form>
                </div>

                <div class="col-lg-12">
                     <a href="{{URL::previous()}}"><button class="btn btn-lg btn-info">Cofnij</button></a>
                     <hr />
                </div>

                <div class="container">
                <div class="row">
                <div class="col-lg-12 page">
                    <div class="col-lg-12 page-title">
                        <h2>{{$page->title}}</h2>
                    </div>

                    <div class="col-lg-12 page-body">
                        {{$page->body}}
                    </div>
                </div>
                </div>
                </div>
    </div>
</div>
@endsection
