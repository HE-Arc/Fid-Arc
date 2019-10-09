@extends('layouts.app')

@section('content')
<div class="container">
  <div id="createCompanyAccount">
    <h1>Create a company account</h1>
      {{ Form::open(['route' => 'home']) }}
      <div id="companyRegisterPart1" style="display:none;">
        {{ Form::label('email', 'E-Mail Address : ') }}
        {{ Form::email('email', null, ['class' => 'form-control']) }}

        {{ Form::label('firstName', 'First Name : ') }}
        {{ Form::text('firstName', null, ['class' => 'form-control']) }}

        {{ Form::label('lastName', 'Last Name : ') }}
        {{ Form::text('lastName', null, ['class' => 'form-control']) }}

        {{ Form::label('password', 'Password : ') }}
        {{ Form::password('password', ['class' => 'form-control']) }}

        {{ Form::label('confirmPassword', 'Confirm Password : ') }}
        {{ Form::password('confirmPassword', ['class' => 'form-control']) }}

        <a href="#" id="btnNextStep1" class="btn btn-dark btn-block" role="button">Next Step (1/3)</a>
      </div>
      <div id="companyRegisterPart2">
        {{ Form::label('companyName', 'Company Name : ') }}
        {{ Form::text('companyName', null, ['class' => 'form-control']) }}

        <div id="map" style="height:400px; width:100%;"></div>
      </div>
  {{ Form::close() }}
</div>
  

@endsection
