@extends('admin.layouts.app')

@section('content')
<div class="container content boxshadow roundcorners">
    <div class="row">
        <div class="col-lg-12 ettings">
            <div class="settings">
                <form method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="title">Nazwa strony</label>
                            <input type="text" class="form-control" id="app_name" name="app_name" value="{{ $siteSettings->app_name }}" required>
                        </div>
                        
                        <div class="form-group col-lg-12">
                            <label for="watermark">Znak wodny (najlepiej PNG do 200x200px)</label>
                            <input type="file" class="form-control-file" id="watermark" name="watermark">
                            <div class="col-lg-12">
                                <img id="holder" style="margin:15px 0;max-height:150px;" src="{{ asset('storage/'.$siteSettings->watermark) }}">
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

@section('footerScripts')
@include('admin.layouts.tinymce.tinymce')
@endsection