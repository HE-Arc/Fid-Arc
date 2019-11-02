@extends('layouts.app')

@section('content')

<div class="container">
  <div id="ourPartners">
    <h1>Our partners on the map</h1>
    <div id="mapPartners" style="height:400px; width:100%;"></div>
        <h2>Last subscribed company</h2>
        @foreach ($lastCompanies as $company)
        <div class="card border-dark mb-3">
          <div class="card-body text-dark">
            <h5 class="card-title"><strong>{{$company->company_name}}</strong></h5>
            <p class="card-text">{{$company->company_description}}</p>
          </div>
        </div>
        @endforeach
    </div>
  </div>
</div>
@endsection
