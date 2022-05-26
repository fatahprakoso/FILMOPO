@extends('layouts.main')

@section('app')

<style>
    body {
        background-color: #fff;
    }
</style>

<div class="" style="margin-top: 10vh;">

    <div class="container">
        <div class="image"></div>
        <div class="overlay">
            <a href="#" class="icon" title="User Profile"></a>
        </div>
    </div>

    <style>
        .container {
            position: relative;
            width: 100%;
            max-width: 400px;
        }

        .image {
            display: block;
            width: 500px;
            height: 500px;
        }

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: .3s ease;
            background-image: url('https://cdn.icon-icons.com/icons2/1946/PNG/512/1904677-add-addition-calculate-charge-create-new-plus_122527.png');
        }

        .container:hover .overlay {
            opacity: 1;
        }

        .icon {
            color: white;
            font-size: 100px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .fa-user:hover {
            color: #eee;
        }
    </style>

    <div class="d-flex flex-column bd-highlight mb-3">
        <div class="p-2 bd-highlight">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="font-weight-bold card-title" style="font-weight: bold;">Avengers Endgame (2019)</h5>
                            <p class="card-text"><small class="text-muted">149 menit</small></p>
                            <div class="d-flex flex-column bd-highlight mb-2">
                                <div class="p-0 bd-highlight">Actor :</div>
                                <div class="p-2 bd-highlight">Robert Downey Jr.</div>
                                <div class="p-2 bd-highlight">Chris Hemsworth</div>
                                <div class="p-2 bd-highlight">Mark Ruffalo</div>
                            </div>
                            <div class="container">
                                <div class="row text-center gap-2">
                                    <div class="rounded-pill col bg-dark text-info">
                                        Action
                                    </div>
                                    <div class="rounded-pill col bg-dark text-info">
                                        Adventure
                                    </div>
                                    <div class="rounded-pill col bg-dark text-info">
                                        Sci-Fi
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 bg-danger">
                        <div class="card-body">
                            <p class="card-text">
                                <img class="img-fluid" style="max-width: 2vw; max-height: 2vw;" alt="Responsive image" src="https://cdn-icons.flaticon.com/png/512/484/premium/484662.png?token=exp=1653560638~hmac=d61f69b184b54df7d8403c1b67acee1a">
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="p-2 bd-highlight">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection