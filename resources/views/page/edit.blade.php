@extends('layouts.app')

@section('content')
<div class="container content">
    <div class="row">
                <div class="col-lg-12">
                    @include('layouts.flash')
                    @include('layouts.errors')
                </div>
                <div class="col-lg-12 page">
                    <div class="page">
                        <form method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{$page->title}}" required>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="metatitle">Meta title</label>
                                    <input type="text" class="form-control" id="metatitle" name="metatitle" value="{{$page->metatitle}}" required>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="metadescription">Meta description</label>
                                    <input type="text" class="form-control" id="metadescription" name="metadescription" value="{{$page->metadescription}}" required>
                                </div>
                                
                                <div class="form-group col-lg-12">
                                    <label for="slug">Odnośnik (bez pl znaków)</label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{$page->slug}}" required>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="body">Treść</label>
                                    <textarea class="form-control tinymce" id="body" name="body" rows="26">{{$page->body}}</textarea>
                                </div>

                                <div class="form-group col-lg-12">
                                <div class="checkbox">
                                     <label>
                                        <input type="checkbox" id="news" name="news" value="1"
                                        @if($page->news == 1)
                                            checked
                                        @endif
                                        >
                                        Wyświetlaj w aktualnościach.
                                     </label>
                                </div>
                                
                                </div>
                            </div>

                            <div class="row">
                                <hr />
                                <div class="form-group col-lg-12">
                                <button type="submit" class="btn btn-primary">Zapisz</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
</div>
@endsection

@section('footerscripts')
    @include('admin.layouts.tinymce.tinymce')
@endsection