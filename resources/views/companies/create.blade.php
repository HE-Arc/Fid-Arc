@extends('layouts.app')

@section('content')

<div class="container">
  <div id="createCompanyAccount">
    <h1>Create a company account</h1>
      {{ Form::open(['url' => 'companies']) }}
      <div id="companyRegisterPart1" >
        {{ Form::label('email', 'E-mail address : ') }}
        {{ Form::email('email', old('email'), $errors->has('email') ? ['class'=>'is-invalid form-control'] : ['class' => 'form-control']) }}
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        {{ Form::label('first_name', 'First name : ') }}
        {{ Form::text('first_name', old('first_name'), $errors->has('first_name') ? ['class'=>'is-invalid form-control'] : ['class' => 'form-control']) }}
        @error('first_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        {{ Form::label('last_name', 'Last name : ') }}
        {{ Form::text('last_name', old('last_name'), $errors->has('last_name') ? ['class'=>'is-invalid form-control'] : ['class' => 'form-control']) }}
        @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        {{ Form::label('password', 'Password : ') }}
        {{ Form::password('password', $errors->has('password') ? ['class'=>'is-invalid form-control'] : ['class' => 'form-control']) }}
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        {{ Form::label('password_confirmation', 'Confirm password : ') }}
        {{ Form::password('password_confirmation', $errors->has('password_confirmation') ? ['class'=>'is-invalid form-control'] : ['class' => 'form-control']) }}
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <button href="#" id="btnNextStep1" class="btn btn-dark btn-block" onclick="toggleCompanyFormPage(1,2,true); return false;">Next Step (1/3)</button>
      </div>
      <div id="companyRegisterPart2" style="display:none;">
        <button href="#" class="btn btn-info" onclick="toggleCompanyFormPage(2,1,false); return false;">&lt; Return</button>
        {{ Form::label('company_name', 'Company name : ') }}
        {{ Form::text('company_name', old('company_name'), $errors->has('company_name') ? ['class'=>'is-invalid form-control'] : ['class' => 'form-control']) }}
        @error('company_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        {{ Form::label('company_description', 'Small company description : ') }}
        {{ Form::textarea('company_description', old('company_description'), $errors->has('company_description') ? ['class'=>'is-invalid form-control'] : ['class' => 'form-control']) }}
        @error('company_description ?>')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        {{ Form::label('company_location', 'Select your company location : ')}}
        @error('company_location')
            <strong>{{ $message }}</strong>
        @enderror
        <div id="mapCompanyRegister" style="height:400px; width:100%;"></div>
        {{ Form::hidden('latitude', old('latitude')) }}
        {{ Form::hidden('longitude', old('longitude')) }}

        <button href="#" id="btnNextStep2" class="btn btn-dark btn-block" onclick="toggleCompanyFormPage(2,3,true); return false;">Next Step (2/3)</button>
      </div>
      <div id="companyRegisterPart3" style="display:none;">
        <button href="#" class="btn btn-info" onclick="toggleCompanyFormPage(3,2,false); return false;">&lt; Return</button>
        <h2>Card customisation</h2>
        {{ Form::label('number_fidelity_points', 'Number of fidelity points : ')}}
        {{ Form::selectRange('number_fidelity_points', 1, 20,  5, $errors->has('number_fidelity_points') ? ['class'=>'is-invalid form-control'] : ['class' => 'form-control']) }}
        @error('number_fidelity_points')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        {{ Form::label('card_color', 'Card color : ')}}
        <select name="card_color" class="form-control @error('card_color') is-invalid @enderror">
          @foreach($card_colors as $card_color)
          <option value={{$card_color->id}}>{{ucfirst($card_color->color)}}</option>
          @endforeach
        </select>
        @error('card_color')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        {{ Form::label('message_to_user', 'Write a message tha will be displayed to the user when he has completed all card points : ')}}
        {{ Form::textarea('message_to_user', old('message_to_user'), $errors->has('message_to_user') ? ['class'=>'is-invalid form-control'] : ['class' => 'form-control'])}}
        @error('message_to_user')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <button href="#" id="btnNextStep3" class="btn btn-dark btn-block" onclick="toggleCompanyFormPage(3,3,true,true); return false;">Finalize your account (3/3)</button>
      </div>
  {{ Form::close() }}
</div>


@endsection
