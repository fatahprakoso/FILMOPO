@extends('layouts.main')

@section('app')
    <x-card-container></x-card-container>
    <script>
        const container = document.querySelector('.card-container');
        async function generateCard(id) {
            const c = await fetch(`http://www.omdbapi.com/?apikey=b206be1f&i=${id}`)
                .then(r => r.json())
                .catch((e) => console.log(e))
                .finally(() => console.log('finally'));

            console.log(c);
            let card = `
        <div class="card d-flex flex-column justify-content-center align-itemns-center" style="width: 20rem; background:green">
            <img class="card-img-top" style="object-fit: cover;  height: 30rem; width: 20rem" src="${c.Poster}" alt="Card image cap">
            <div class="card-body">
                <h5>${c.Title.length > 30? `${c.Title.substring(0, 27)}...` : c.Title} </h5>
                <h6>${c.Year}</h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">${c.Actors}</li>
                <li class="list-group-item">${c.Genre}</li>
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

        async function getMoviesId() {
            const title = `{{ $search }}`;
            console.log(title);
            const id = await fetch(`https://www.omdbapi.com/?apikey=b206be1f&s=${title}&type=movie`)
                .then(r => r.json()).then(r => console.log(r))
                .catch((e) => console.log(e))
                .finally(() => console.log('finally'));
        }

        getMoviesId()
    </script>
@endsection
