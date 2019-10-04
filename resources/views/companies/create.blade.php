@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Create a company account</h1>
  <br>

{{ Form::open(['route' => 'home']) }}
<div id="companyRegisterPart1">
  {{ Form::label('email', 'E-Mail Address : ') }}
  {{ Form::email('email', null, ['class' => 'form-control']) }}
  <br>
  {{ Form::label('firstName', 'First Name : ') }}
  {{ Form::text('firstName', null, ['class' => 'form-control']) }}
  <br>
  {{ Form::label('lastName', 'Last Name : ') }}
  {{ Form::text('lastName', null, ['class' => 'form-control']) }}
  <br>
  {{ Form::label('companyName', 'Company Name : ') }}
  {{ Form::text('companyName', null, ['class' => 'form-control']) }}
  <br>
  {{ Form::label('password', 'Password : ') }}
  {{ Form::password('password', ['class' => 'form-control']) }}
  <br>
  {{ Form::label('confirmPassword', 'Confirm Password : ') }}
  {{ Form::password('confirmPassword', ['class' => 'form-control']) }}
  <br>
  <a href="#" id="btnNextStep1" class="btn btn-dark btn-block" role="button">Next Step (1/3)</a>
</div>

  {{ Form::close() }}

@endsection
