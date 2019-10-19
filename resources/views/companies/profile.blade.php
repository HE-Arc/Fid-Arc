@extends('layouts.app')

@section('content')

<div class="container">
  <div id="companyProfile">
    <h1 class="text-center">Company profile</h1>
    <div class="row">
      <div class="col-sm">
        <h3 class="text-center">Account informations</h3>
        <p class="text-center">{{ $userInfos->name }}</p>
        <p class="text-center">{{ $userInfos->email }}</p>
        <p class="text-center">{{ $companyInfos->company_name }}</p>
        <p class="text-center">{{ $companyInfos->company_description }}</p>
        <p class="text-center">{{ $companyInfos->number_fidelity_points }}</p>
        <p class="text-center">{{ $companyInfos->card_color_id }}</p>
        <p class="text-center">{{ $companyInfos->message_to_user }}</p>
      </div>
      <div class="col-sm" >
        <h2 class="text-center">Send email to user</h2>
      </div>
    </div>
  </div>
</div>

@endsection
