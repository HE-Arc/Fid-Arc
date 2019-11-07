@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="display-3">Welcome on Fid-Arc.</h1>
        <p class="lead">The future of fidelity cards. For clients and companies.</p>

        <div class="bd-example mt-3">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://source.unsplash.com/pb_lF8VWaPU/1000x300" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/pb_lF8VWaPU/1000x300" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/pb_lF8VWaPU/1000x300" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>

        <p class="h2 mt-5">Discover our advantages.</p>

        <div class="row mt-5 mb-5">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://source.unsplash.com/pb_lF8VWaPU/800x200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card with stretched link</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://source.unsplash.com/pb_lF8VWaPU/800x200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card with stretched link</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://source.unsplash.com/pb_lF8VWaPU/800x200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card with stretched link</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection