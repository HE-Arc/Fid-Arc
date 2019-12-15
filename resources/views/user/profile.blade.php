@extends('layouts.app')

@push('head')
    <script src="{{ asset('js/getPersonnalInfosViaApi.js') }}" defer></script>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div id="userProfile">
                <div class="row">
                    <aside class="col-lg-3 col-md-5 col-sm-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Your personal informations</h3>
                                <p class="card-text mb-0"><strong>E-Mail :</strong> {{ $user->email }}</p>
                                <p class="card-text mb-0"><strong>Name :</strong> {{ $user->name }}</p>
                                <p class="card-text mb-0"><strong>Lastname :</strong> {{ $user->lastname }}</p>
                                <!-- <a href="#" class="card-link">Edit your informations</a> -->
                                <!-- <a href="#" class="card-link"><br>Reset your password</a> -->
                            </div>
                        </div>
                    </aside>
                    <section class="col-lg-9 col-md-7 col-sm-12 mb-3">
                        <h1>Your fidelity cards</h1>

                        <div class="loader" id="loader-fidelitycards"></div>
                        <div id="fidelitycards"></div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection