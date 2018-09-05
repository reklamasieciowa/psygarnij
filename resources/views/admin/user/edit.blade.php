@extends('admin.layouts.app')

@section('content')
<div class="container content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edytuj {{ $user->name }}</div>

                <div class="card-body">
                    <form method="POST" aria-label="{{ __('Register') }}">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$user->name}}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$user->email}}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @if(Auth::user()->id !== $user->id) 
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Role</label>
                                <div class="col-md-8">
                                    @foreach($pageRoles as $role)
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="roles[]" name="roles[]" value="{{ $role->id }}" 
                                        @if($user->hasRole($role->id))
                                        checked="checked"
                                        @endif
                                        >
                                        <label class="form-check-label active" for="role">{{ $role->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Zapisz
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
