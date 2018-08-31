@extends('admin.layouts.app')

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-lg-12 page">
            <form method="POST" action="{{ route('userstore') }}" aria-label="{{ __('Register') }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="title">Nazwa</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="metatitle">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required>
                    </div>

                    //newsletter'a brak

                    //powiadomienia brak

                        <div class="form-group col-lg-12">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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

@section('footerscripts')
@include('admin.layouts.tinymce.tinymce')
@endsection