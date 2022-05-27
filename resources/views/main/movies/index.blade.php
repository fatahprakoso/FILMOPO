@extends('layouts.main')

@section('app')
    <x-card-container></x-card-container>

    <style>
        .card:hover form button img {
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
            z-index: 100;
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
            z-index: 10;
        }

        .card:hover .movie-actor-genre {
            filter: blur(2px);
            transition: 1s;
        }

        .card:hover .movie-poster {
            filter: blur(5px);
            transition: 1s;
        }

        .card:hover .movie-title {
            filter: blur(1px);
            transition: 1s;
        }

    </style>

    <script>
        const container = document.querySelector('.card-container');
        async function generateCard(id) {
            const c = await fetch(`http://www.omdbapi.com/?apikey=b206be1f&i=${id}`)
                .then(r => r.json())
                .catch((e) => console.log(e))
                .finally(() => console.log('finally'));

            let card = `
        <div class="hvr-grow-shadow card d-flex flex-column justify-content-center align-itemns-center" style="width: 100%; background-color:#ECB365; margin-bottom: 30px">
            <form method="POST" action="{{ route('watchlist') }}">
                @csrf
                <input type="hidden" name="id" value="${id}">
                <input type="hidden" name="name" value="${c.Title}">
                <input type="hidden" name="rated" value="${c.Rated}">
                <input type="hidden" name="length" value="${c.Runtime}">
                <input type="hidden" name="release_dt" value="${c.Released}">
                <input type="hidden" name="poster" value="${c.Poster}">
                <input type="hidden" name="actors" value="${c.Actors}">
                <input type="hidden" name="genre" value="${c.Genre}">
                <button type="submit" class="btn d-flex justify-content-center align-items-center" style="position:absolute; z-index:2; height:100%; width:100%;">
                    <img class="add-icon" src="https://cdn.icon-icons.com/icons2/1946/PNG/512/1904677-add-addition-calculate-charge-create-new-plus_122527.png" alt="add" style=" width: 125px; height: 125px; object-fit: cover; object-position: center;">
                    <div class="overlay"></div>
                </button>
            </form>
            <img class="card-img-top movie-poster" style="object-fit: cover;  height: 30rem" src="${c.Poster}" alt="Card image cap">
            <div class="card-body movie-title">
                <h5 style="font-weight: bold;">${c.Title.length > 30? `${c.Title.substring(0, 27)}...` : c.Title} </h5>
                <h6>${c.Year}</h6>
            </div>
            <ul class="list-group list-group-flush movie-actor-genre">
                <li class="list-group-item">${c.Actors.length > 37? `${c.Actors.substring(0, 27)}...` : c.Actors}</li>
                <li class="list-group-item">${c.Genre.length > 37? `${c.Genre.substring(0, 27)}...` : c.Genre}</li>
            </ul>
        </div>
        `;

            return card
        }

        function insertCards(cardsId) {
            cardsId.forEach(id => {
                let cardBuffer = document.createElement('div');
                generateCard(id).then(card => {
                    cardBuffer.innerHTML = card;
                    container.appendChild(cardBuffer);
                });
            });
        }

        insertCards(['tt4154756', 'tt4154664', 'tt1201607', 'tt3874544', 'tt0816692', 'tt2911666', 'tt6921996',
            'tt2375379', 'tt1055369', 'tt2302755', 'tt0499549', 'tt0441773', 'tt1220719', 'tt3783958',
            'tt1229238'
        ])
    </script>
@endsection
