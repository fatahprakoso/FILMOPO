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

                let card = `
        <div class="hvr-blur hvr-grow-shadow card d-flex flex-column justify-content-center align-itemns-center" style="width: 20rem; background:green; margin-bottom: 100px">
            <div class="hvr-fade position-absolute" style="z-index:10; width:20rem; height:100%"></div>
            <img class="card-img-top" style="object-fit: cover;  height: 30rem; width: 20rem" src="${c.Poster}" alt="Card image cap">
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
