@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 card p-5">
                <div class="text-center mb-5">
                    <h1>Register</h1>
                </div>
                {{ Form::open(['url' => 'register']) }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        {{ Form::label('name', 'First name') }}
                        {{ Form::text('name', old('name'), $errors->has('name') ? ['class'=>'is-invalid form-control'] : ['class' => 'form-control']) }}
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('lastname', 'Last name') }}
                        {{ Form::text('lastname', old('lastname'), $errors->has('lastname') ? ['class'=>'is-invalid form-control'] : ['class' => 'form-control']) }}
                        @error('lastname')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
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

                <div class="form-group">
                    {{ Form::label('password_confirmation', 'Confirm password') }}
                    {{ Form::password('password_confirmation', $errors->has('password_confirmation') ? ['class'=>'is-invalid form-control'] : ['class' => 'form-control']) }}
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
