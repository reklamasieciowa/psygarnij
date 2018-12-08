@extends('admin.layouts.app')

@section('content')
<div class="container content boxshadow roundcorners">
    <div class="row">
        <div class="col-lg-12 page">
            <form method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="title">Tytuł</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required>
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="metatitle">Meta tytuł</label>
                        <input type="text" class="form-control" id="metatitle" name="metatitle" value="{{old('metatitle')}}" required>
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="metadescription">Meta opis</label>
                        <input type="text" class="form-control" id="metadescription" name="metadescription" value="{{old('metadescription')}}" required>
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="slug">Odnośnik <em>(<strong>Opcjonalnie</strong>, bez pl i białych znaków)</em></label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="body">Treść</label>
                        <textarea class="form-control tinymce" id="body" name="body" rows="16">{{old('body')}}</textarea>
                    </div>

                    <div class="form-group col-lg-12">
                        <div class="checkbox">
                         <label>
                            <input type="checkbox" id="news" name="news" value="1">
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
@endsection

@section('footerScripts')
@include('admin.layouts.tinymce.tinymce')
@endsection