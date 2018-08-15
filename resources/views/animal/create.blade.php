@extends('layouts.app')

@section('content')
<div class="container content">
    <div class="row">
                <div class="col-lg-12">
                    @include('layouts.flash')
                    @include('layouts.errors')
                </div>
                <div class="col-lg-12 animal">
                    <div class="animal">
                        <form method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <label for="name">Imię</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="age">Wiek</label>
                                    <input type="number" class="form-control" id="age" name="age" value="{{old('age')}}" required>
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="location">Lokalizacja</label>
                                    <input type="text" class="form-control" id="location" name="location" value="{{old('location')}}" required>
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="added">Dodany</label>
                                    <input type="datetime" class="form-control" id="added" name="added" value="{{Carbon\Carbon::now()}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <textarea class="form-control" id="description" name="description" rows="5">{{old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <div class="radio">
                                      <label>
                                            <input type="radio" name="sex" id="sex" value="samiec" 
                                            @if(old('sex') == 'samiec')
                                            checked
                                            @endif
                                            >
                                            Samiec
                                        </label>
                                        <label>
                                            <input type="radio" name="sex" id="sex" value="samica"
                                            @if(old('sex') == 'samica')
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
                                            @if(old('homeless') == 0)
                                            checked
                                            @endif
                                            >
                                            Psygarnięty
                                        </label>
                                        <label>
                                            <input type="radio" name="homeless" id="homeless" value="1"
                                            @if(old('homeless') == 1)
                                            checked
                                            @endif
                                            >
                                            Do przygarnięcia
                                        </label>
                                        <label>
                                            <input type="radio" name="homeless" id="homeless" value="2"
                                            @if(old('homeless') == 2)
                                            checked
                                            @endif
                                            >
                                            Zaginiony
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="avatar">Zdjęcie (jpg do 2MB)</label>
                                    <input type="file" class="form-control" id="avatar" name="avatar">
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