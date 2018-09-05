@extends('front.layouts.app')

@section('metatitle')
<title>Aktualności - {{ $siteSettings->app_name }}</title>
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
    <div class="row">
    @foreach($pages as $page)
        <div class="col-lg-6 news">
            <div class="row boxshadow roundcorners">
                <div class="col-lg-12 news-title">
                    <h3>{{$page->title}}</h3>
                </div>

                <div class="col-lg-12 news-body">
                    {{ str_limit(strip_tags($page->body), 350) }}
                </div>

                <div class="col-lg-12 added">
                   <i class="material-icons today">today</i> {{Carbon\Carbon::parse($page->created_at)->diffForHumans()}}
                </div>

                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route('pageshow', [$page->slug]) }}">Więcej</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{ $pages->links() }}
        </div>
    </div>
</div>
@endsection
