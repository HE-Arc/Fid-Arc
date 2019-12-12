@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 card p-5">
                <div class="text-center mb-5">
                    <h1>Login</h1>
                </div>
                {{ Form::open(['url' =>'login']) }}
                <div class="form-group">
                    {{ Form::label('email', 'E-mail address') }}
                    {{ Form::email('email', old('email'), $errors->has('email') ? ['class'=>'is-invalid form-control'] : ['class' => 'form-control']) }}
                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password', $errors->has('password') ? ['class'=>'is-invalid form-control'] : ['class' => 'form-control']) }}
                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="col-md-8">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection