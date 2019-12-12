@extends('layouts.app')

@push('head')
<script src="{{ asset('js/getPersonnalInfosViaApi.js') }}" defer></script>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Your personal informations</h3>
                    <p class="card-text mb-0"><strong>E-Mail :</strong> {{ $user->email }}</p>
                    <p class="card-text mb-0"><strong>Name :</strong> {{ $user->name }}</p>
                    <p class="card-text mb-0"><strong>Lastname :</strong> {{ $user->lastname }}</p>
                    <p class="card-text"><strong>Member since :</strong> {{ date('F d, Y', strtotime($user->created_at)) }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-7 col-sm-12 mb-3">
            <h1>Your fidelity cards</h1>
            <hr>

            <div class="loader" id="loader-fidelitycards"></div>
            <div id="fidelitycards"></div>
        </div>
    </div>
</div>
@endsection