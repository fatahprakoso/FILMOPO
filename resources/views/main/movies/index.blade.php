@extends('layouts.main')

@section('app')
<x-card-container></x-card-container>

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

<script>
    const container = document.querySelector('.card-container');
    async function generateCard(id) {
        const c = await fetch(`http://www.omdbapi.com/?apikey=b206be1f&i=${id}`)
            .then(r => r.json())
            .catch((e) => console.log(e))
            .finally(() => console.log('finally'));

        let card = `
        <div class="hvr-blur hvr-grow-shadow card d-flex flex-column justify-content-center align-itemns-center" style="width: 20rem; background:#ECB365; margin-bottom: 30px">
            <div class="container">
                <div class="image"></div>
                <div class="overlay">
                    <a href="#" class="icon" title="User Profile"></a>
                </div>
            </div>
            <form method="POST" action="{{route('watchlist')}}" class="hvr-fade position-absolute" style="z-index:10; width:20rem; height:100%; background-color:rgba(51, 51, 51, 0)">
                @csrf
                <input type="hidden" name="id" value="${id}">
                <input type="hidden" name="title" value="${c.Title}">
                <input type="hidden" name="rated" value="${c.Rated}">
                <input type="hidden" name="runtime" value="${c.Runtime}">
                <input type="hidden" name="released" value="${c.Released}">
                <input type="hidden" name="poster" value="${c.Poster}">
                <input type="hidden" name="actors" value="${c.Actors}">
                <input type="hidden" name="genre" value="${c.Genre}">
                <button type="submit" class="btn btn-block" style="width:100%; height:100%; background-color:rgba(51, 51, 51, 0)"></button>
            </form>
            <img class="card-img-top" style="object-fit: cover;  height: 30rem" src="${c.Poster}" alt="Card image cap">
            <div class="card-body">
                <h5 style="font-weight: bold;">${c.Title.length > 30? `${c.Title.substring(0, 27)}...` : c.Title} </h5>
                <h6>${c.Year}</h6>
            </div>
            <ul class="list-group list-group-flush">
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