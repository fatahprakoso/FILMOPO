<style>
    @media only screen and (max-width: 768px) {
        .cardWatchlist {
            max-height: 262.08px;
            object-fit: cover;
        }
    }

    @media only screen and (min-width: 769px) {
        .cardWatchlist {
            width: 100%;
            max-height: 262.08px;
            object-fit: cover;
        }
    }

</style>

<div class="card mb-3" style="width: 1350px; margin: 0 auto; float: none; margin-bottom: 10px;">
    <div class="row g-0">
        <div class="first-col col-md-4 bg-warning">
            <img src="{{ $poster }}" class="img-fluid rounded-start cardWatchlist">
        </div>
        <div class="sec-col col-md-7">
            <div class="card-body">

                <div class="d-flex bd-highlight">
                    <div class="me-auto bd-highlight">
                        <h5 class="font-weight-bold card-title" style="font-weight: bold; font-size: 1.6rem;">
                            {{ $name }} ({{ $releasedt }})</h5>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input watched-btn" type="checkbox" id="flexSwitchCheckDefault">
                        <input class="id" type="hidden" name="id" value="{{ $movieid }}">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Watched</label>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-9">
                            <p class="card-text mb-2"><small class="text-muted">{{ $length }}</small></p>
                            <div class="d-flex flex-column bd-highlight">
                                <div class="p-0 bd-highlight">Actor :</div>
                                {{ $actors }}
                            </div>
                        </div>
                        <div class="col justify-content-end align-self-center">
                            <div class="d-flex justify-content-center align-items-center"
                                style="background-color: red; border-radius: 50%; width:100px; height:100px">
                                <p style="color:white; font-style: italic; font-size: 1.8rem; font-weight: 900"
                                    class="mb-0">{{ $rated }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row text-center mx-3 gap-4">
                        {{ $genres }}
                    </div>
                </div>

            </div>
        </div>
        <form method="DELETE" action={{ route('watchlist.destroy') }} class="third-col col-md-1 bg-danger">
            <input class="id" type="hidden" name="id" value="{{ $movieid }}">
            <button class="btn d-flex flex-column justify-content-center align-items-center del-btn"
                style="z-index:2; height:100%; width:100%;">
                <img class="img-fluid" style="width: 40px; height: 40px;" alt="trash"
                    src="{{ asset('icon_trash-bin.png') }}">
            </button>
        </form>
    </div>
</div>
