@extends('layouts.app')

@section('content')

<div class="container">
  <div id="companyProfile">
    <h1 class="text-center">Company profile</h1>
    <div class="row">
      <div class="col-sm">
        <h3 class="text-center">Account informations</h3>
        <div class="card border-secondary">
          <div class="card-header"><strong>Personnal infos</strong></div>
          <div class="card-body">
            <p class="text-center"><strong>First name : </strong>{{ $userInfos->name }}</p>
            <p class="text-center"><strong>Last name : </strong>{{ $userInfos->lastname }}</p>
            <p class="text-center"><strong>Email : </strong>{{ $userInfos->email }}</p>
            <p class="text-center"><strong>Company name : </strong>{{ $companyInfos->company_name }}</p>
            <p class="text-center"><strong>Company description : </strong>{{ $companyInfos->company_description }}</p>
          </div>
        </div>
        <div class="card border-secondary">
          <div class="card-header"><strong>Card infos</strong></div>
          <div class="card-body">
            <p class="text-center"><strong>Number of fidelity points : </strong>{{ $companyInfos->number_fidelity_points }}</p>
            <p class="text-center"><strong>Card color : </strong>{{ $cardColor }}</p>
            <p class="text-center"><strong>Message to user : </strong>{{ $companyInfos->message_to_user }}</p>
          </div>
        </div>
      </div>
      <div class="col-sm" >
        <h3 class="text-center">Send email to user</h3>
        <div class="card border-secondary">
          <div class="card-header"><strong>Email</strong></div>
          <div class="card-body">

            @if (count($errors) > 0)
              <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
              </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
            </div>
            @endif
            <form method="post" action="{{url('/send_mail')}}">
              {{ csrf_field() }}
              <div class="form-group">
              <label>Enter your message</label>
              <textarea name="emailContent" rows="10" class="form-control" placeholder="Email content ..."></textarea>
              </div>
              <div class="form-group">
              <input type="submit" name="send" class="btn btn-dark btn-block" value="Send" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
