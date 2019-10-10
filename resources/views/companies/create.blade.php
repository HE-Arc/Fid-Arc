@extends('layouts.app')

@section('content')
<div class="container">
  <div id="createCompanyAccount">
    <h1>Create a company account</h1>
      {{ Form::open(['url' => 'companies']) }}
      <div id="companyRegisterPart1" >
        {{ Form::label('email', 'E-mail address : ') }}
        {{ Form::email('email', null, ['class' => 'form-control']) }}

        {{ Form::label('firstName', 'First name : ') }}
        {{ Form::text('firstName', null, ['class' => 'form-control']) }}

        {{ Form::label('lastName', 'Last name : ') }}
        {{ Form::text('lastName', null, ['class' => 'form-control']) }}

        {{ Form::label('password', 'Password : ') }}
        {{ Form::password('password', ['class' => 'form-control']) }}

        {{ Form::label('confirmPassword', 'Confirm password : ') }}
        {{ Form::password('confirmPassword', ['class' => 'form-control']) }}

        <button href="#" id="btnNextStep1" class="btn btn-dark btn-block" onclick="toggleCompanyFormPage(1,2,true); return false;">Next Step (1/3)</button>
      </div>
      <div id="companyRegisterPart2" style="display:none;">
        <button href="#" class="btn btn-info" onclick="toggleCompanyFormPage(2,1,false); return false;">&lt; Return</button>
        {{ Form::label('companyName', 'Company name : ') }}
        {{ Form::text('companyName', null, ['class' => 'form-control']) }}

        {{ Form::label('companyDescription', 'Small company description : ') }}
        {{ Form::textarea('companyDescription', null, ['class' => 'form-control']) }}

        {{ Form::label('companyLocation', 'Select your company location : ')}}
        <div id="map" style="height:400px; width:100%;"></div>
        {{ Form::hidden('latitude') }}
        {{ Form::hidden('longitude') }}

        <button href="#" id="btnNextStep2" class="btn btn-dark btn-block" onclick="toggleCompanyFormPage(2,3,true); return false;">Next Step (2/3)</button>
      </div>
      <div id="companyRegisterPart3" style="display:none;">
        <button href="#" class="btn btn-info" onclick="toggleCompanyFormPage(3,2,false); return false;">&lt; Return</button>
        <h2>Card customisation</h2>
        {{ Form::label('numberFidelityPoints', 'Number of fidelity points : ')}}
        {{ Form::selectRange('numberFidelityPoints', 0, 20,  5, ['class' => 'form-control']) }}

        {{ Form::label('cardColor', 'Card color : ')}}
        {{ Form::select('cardColor',array('red' => 'Red',
                                          'blue' => 'Blue',
                                          'green' => 'Green',
                                          'yellow' => 'Yellow',
                                          'black' => 'Black',
                                          'white' => 'White'), 'red', ['class' => 'form-control']) }}

        {{ Form::label('messageToUser', 'Write a message tha will be displayed to the user when he has completed all card points : ')}}
        {{ Form::textarea('messageToUser', null, ['class' => 'form-control'])}}

        <button href="#" id="btnNextStep2" class="btn btn-dark btn-block" onclick="toggleCompanyFormPage(3,3,true,true); return false;">Finalize your account (3/3)</button>
      </div>
  {{ Form::close() }}
</div>


@endsection
