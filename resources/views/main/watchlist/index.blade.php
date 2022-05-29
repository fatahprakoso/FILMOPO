@extends('layouts.main')

@section('app')

<style>
    /* body {
        background-color: #fff;
    } */
    /* .first-col {

    } */
    /* .sec-col {

    } */
    /* .third-col {

    } */
</style>

<div class="" style="margin-top: 12vh;">

    <div class="d-flex flex-column bd-highlight mb-3">
        <div class="p-2 bd-highlight">
            <div class="card mb-3" style="max-width: 1350px; margin: 0 auto; float: none; margin-bottom: 10px;">
                <div class="row g-0">
                    <div class="first-col col-md-4 bg-warning">
                        <img src="{{asset('poster_money-heist.jpg')}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="sec-col col-md-7">
                        <div class="card-body">

                            <div class="d-flex bd-highlight">
                                <div class="me-auto bd-highlight">
                                    <h5 class="font-weight-bold card-title" style="font-weight: bold; font-size: 1.6rem;">Avengers Endgame (2019)</h5>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Watched</label>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-9">
                                        <p class="card-text mb-2"><small class="text-muted">149 menit</small></p>
                                        <div class="d-flex flex-column bd-highlight">
                                            <div class="p-0 bd-highlight">Actor :</div>
                                            <div class="p-2 bd-highlight">Robert Downey Jr.</div>
                                            <div class="p-2 bd-highlight">Chris Hemsworth</div>
                                            <div class="p-2 bd-highlight">Mark Ruffalo</div>
                                        </div>
                                    </div>
                                    <div class="col justify-content-end align-self-center">
                                        <div class="d-flex justify-content-center align-items-center" style="background-color: red; border-radius: 50%; width:100px; height:100px">
                                            <p style="color:white; font-style: italic; font-size: 1.8rem; font-weight: 900" class="mb-0">PG-13</p>
                                        </div>
                                    </div>
    
    
                                </div>
                            </div>

                            <div class="container">
                                <div class="row text-center mx-3 gap-4">
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
                    <div class="third-col col-md-1 bg-danger">
                        <button class="btn d-flex flex-column justify-content-center align-items-center" style="z-index:2; height:100%; width:100%;">
                            <img class="img-fluid" style="width: 40px; height: 40px;" alt="trash" src="{{asset('icon_trash-bin.png')}}">
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection