@extends('layouts.app')

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-lg-12">
            @include('layouts.flash')
            @include('layouts.errors')
        </div>
        <div class="col-lg-12 animal boxshadow roundcorners">
            <div class="animal">
                <form method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="name">Imię</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$animal->name}}" required>
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="age">Wiek</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{$animal->age}}" required>
                        </div>
                        
                        <div class="form-group col-lg-3">
                            <label for="location">Lokalizacja</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{$animal->location}}" required>
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="added">Dodany</label>
                            <input type="datetime" class="form-control" id="added" name="added" value="{{$animal->added}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <textarea class="form-control tinymce" id="description" name="description" rows="15">{{$animal->description}}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <div class="radio">
                              <label>
                                <input type="radio" name="sex" id="sex" value="samiec" 
                                @if($animal->sex == 'samiec')
                                checked
                                @endif
                                >
                                Samiec
                            </label>
                            <label>
                                <input type="radio" name="sex" id="sex" value="samica"
                                @if($animal->sex == 'samica')
                                checked
                                @endif
                                >
                                Samica
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <div class="radio">
                          <label>
                            <input type="radio" name="homeless" id="homeless" value="0" 
                            @if($animal->homeless == 0)
                            checked
                            @endif
                            >
                            Psygarnięty
                        </label>
                        <label>
                            <input type="radio" name="homeless" id="homeless" value="1"
                            @if($animal->homeless == 1)
                            checked
                            @endif
                            >
                            Do przygarnięcia
                        </label>
                        <label>
                            <input type="radio" name="homeless" id="homeless" value="2"
                            @if($animal->homeless == 2)
                            checked
                            @endif
                            >
                            Zaginiony
                        </label>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <div class="radio">
                          <label>
                            <input type="radio" name="verified" id="verified" value="0" 
                            @if($animal->verified == 0)
                            checked
                            @endif
                            >
                            Niezweryfikowany
                        </label>
                        <label>
                            <input type="radio" name="verified" id="verified" value="1"
                            @if($animal->verified == 1)
                            checked
                            @endif
                            >
                            Zweryfikowany
                        </label>
                    </div>
                </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-12">
                <div class="form-row">
                    <div class="col-lg-12">
                        <label for="avatar">Zdjęcie (jpg do 2MB)</label>
                    </div>
                    <div class="col-lg-12">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="material-icons">add_photo_alternate</i> Wybierz
                        </a>
                    </div>
                    <div class="col-lg-12">
                        <img id="holder" style="margin:15px 0;max-height:150px;" src="{{ asset($animal->avatar) }}">
                    </div>
                </div>
                <div class="form-row">
                   <div class="col-lg-12">
                    <input id="thumbnail" class="form-control" type="text" id="avatar" name="avatar">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
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
<script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
   $('#lfm').filemanager('image');
</script>
@endsection