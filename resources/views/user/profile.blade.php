@extends('layouts.app')

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
                    <a href="#" class="card-link">Edit your informations</a>
                    <a href="#" class="card-link"><br>Reset your password</a>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-7 col-sm-12 mb-3">
            <h1>Your fidelity cards</h1>
            <hr>
            <div class="card mb-3" style="background-color:#00b894;">
                <div class="card-body">
                    <h3 class="card-title mb-0">HE-Arc Restaurant</h3>
                    <p><strong>Come to eat our daily specialities.</strong></p>
                    <p class="mb-0">Your fidelity points is <strong>8/10</strong></p>
                </div>
            </div>

            <div class="card" style="background-color:#74b9ff;">
                <div class="card-body">
                    <h3 class="card-title mb-0">KingFood Restaurant</h3>
                    <p><strong>Do not hesitate to try our new Kebab Burger !</strong></p>
                    <p class="mb-0">Your fidelity points is <strong>3/10</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection