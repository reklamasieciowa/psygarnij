@extends('layouts.app')

@section('metatitle')
<title>Aktualności Psygarnij.</title>
@endsection

@section('metadescription')
<meta name="description" content="Najnowsze informacje z Psygarnij." />
@endsection

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-lg-12">
            <h2>Aktualności</h2>
            <hr />
        </div>
    </div>
    @foreach($pages as $page)
        <div class="row news">
            <div class="col-lg-12 news-title">
                <h2>{{$page->title}}</h2>
            </div>

            <div class="col-lg-12 news-body">
                {{ str_limit(strip_tags($page->body), 350) }}
            </div>

            <div class="col-lg-12 added">
                Dodano: {{Carbon\Carbon::parse($page->created_at)->diffForHumans()}}
            </div>

            <div class="col-lg-12">
                <a href="{{ route('pageshow', [$page->slug]) }}">Więcej</a>
                <hr />
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-12">
            {{ $pages->links() }}
        </div>
    </div>
</div>
@endsection
