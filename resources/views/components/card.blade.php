<style>
    .card:hover form button img {
        opacity: 100%;
        transition: 1s;
    }

    .card:hover form button p {
        opacity: 100%;
        transition: 1s;
    }

    .container {
        position: relative;
        width: 100%;
        max-width: 400px;
    }

    .card form button img {
        opacity: 0;
        position: absolute;
        z-index: 5;
    }

    .card form button p {
        opacity: 0;
        bottom: 13.5rem;
        position: absolute;
        font-weight: bold;
        font-size: 1.1rem;
        z-index: 5;
    }

    .card:hover form button .overlay {
        opacity: 50%;
        transition: 1s;
    }

    .card form button .overlay {
        width: 100%;
        height: 100%;
        background-color: #272727;
        opacity: 0;
        position: absolute;
        z-index: 3;
    }

    .card:hover .movie-actor-genre,
    .card:hover .movie-poster,
    .card:hover .movie-title {
        filter: blur(2px);
        transition: 0.5s;
    }
</style>

<div class="hvr-grow-shadow card d-flex flex-column justify-content-center align-itemns-center" style="background-color:#ECB365; margin-bottom: 30px">
    <form method="POST" action="{{ route('watchlist') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="name" value="{{ $title }}">
        <input type="hidden" name="rated" value="{{ $rated }}">
        <input type="hidden" name="length" value="{{ $runtime }}">
        <input type="hidden" name="release_dt" value="{{ $released }}">
        <input type="hidden" name="poster" value="{{ $poster }}">
        <input type="hidden" name="actors" value="{{ $actors }}">
        <input type="hidden" name="genre" value="{{ $genre }}">
        <button type="submit" class="btn d-flex flex-column justify-content-center align-items-center" style="position:absolute; z-index:2; height:100%; width:100%;">
            <img class="add-icon mb-5" src="{{asset('icon_plus.png')}}" alt="add" style="width: 125px; height: 125px; object-fit: cover; object-position: center; box-shadow:0 0 10px #000; border-radius: 25px;">
            <p class="mt-5" style="color: white;">Tambahkan film ke watchlist</p>
            <div class="overlay"></div>
        </button>
    </form>
    <img class="card-img-top movie-poster" style="object-fit: cover;  height: 30rem" src="{{ $poster }}" alt="Card image cap">
    <div class="card-body movie-title">
        <h5 style="font-weight: bold;">
            {{ $titleCutted }}
        </h5>
        <h6>{{ $released }}</h6>
    </div>
    <ul class="list-group list-group-flush movie-actor-genre">
        <li class="list-group-item">{{ $actorsCutted }}</li>
        <li class="list-group-item">{{ $genreCutted }}</li>
    </ul>
</div>