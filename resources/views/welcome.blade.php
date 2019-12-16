@extends('layouts.app')

@section('content')

    <div id="main-page" class="container-fluid">

        <section id="callToAction">
            <div class="container h-100">
                <div class="h-100 d-flex flex-column justify-content-center align-items-start text-left">
                    <h1 class="display-1">Scan and win!</h1>
                    <p class="display-4">Discover our new app which allow you to earn points and redeem for prizes.</p>
                    <p class="lead mt-5">
                        <a class="btn btn-primary btn-lg" href="#" role="button">Download the app</a>
                    </p>
                </div>
            </div>
        </section>

        <section id="partners">
            <div id="mapPartners" style="height:500px; width:100%;"></div>
            <div id="cardPartners" class="container py-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="display-3">Our partners</h1>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="single-card">
                            <div class="card-photo">
                                <img src="https://images.unsplash.com/photo-1423784346385-c1d4dac9893a?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=800&h=533&fit=crop&ixid=eyJhcHBfaWQiOjF9" alt="">
                            </div>
                            <div class="card-content">
                                <h3><a href="#">Mäder</a></h3>
                                <ul class="card-meta">
                                    <li><span class="ti-calendar"></span> <a href="#">Dec 01, 2019</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nemo eaque expedita
                                    aliquid dolorem repellat perferendis, facilis aut fugit, impedit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="single-card">
                            <div class="card-photo">
                                <img src="https://images.unsplash.com/photo-1423784346385-c1d4dac9893a?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=800&h=533&fit=crop&ixid=eyJhcHBfaWQiOjF9" alt="">
                            </div>
                            <div class="card-content">
                                <h3><a href="#">Walder Chocolaterie</a></h3>
                                <ul class="card-meta">
                                    <li><span class="ti-calendar"></span> <a href="#">Dec 01, 2019</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nemo eaque expedita
                                    aliquid dolorem repellat perferendis, facilis aut fugit, impedit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="single-card">
                            <div class="card-photo">
                                <img src="https://images.unsplash.com/photo-1423784346385-c1d4dac9893a?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=800&h=533&fit=crop&ixid=eyJhcHBfaWQiOjF9" alt="">
                            </div>
                            <div class="card-content">
                                <h3><a href="#">King Food</a></h3>
                                <ul class="card-meta">
                                    <li><span class="ti-calendar"></span> <a href="#">Dec 01, 2019</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nemo eaque expedita
                                    aliquid dolorem repellat perferendis, facilis aut fugit, impedit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>

        </section>
    </div>

@endsection