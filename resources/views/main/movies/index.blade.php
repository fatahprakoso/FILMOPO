@extends('layouts.main')

@section('app')

<div class="card-container container-fluid d-flex flex-wrap bg-dark mb-5 ml-5 mr-5 justify-content-center align-items-center" style="margin-top:10vh; row-gap: 20px; column-gap: 70px;">
</div>

<script>
    const container = document.querySelector('.card-container');
    async function generateCard(id){
        const c = await fetch(`http://www.omdbapi.com/?apikey=b206be1f&i=${id}`)
        .then(r => r.json())
        .catch((e) => console.log(e))
        .finally(() => console.log('finally'));
    
        console.log(c);
        let card = `
        <div class="card" style="width: 25rem;">
            <img class="card-img-top card-1" src="${c.Poster}" alt="Card image cap">
            <div class="card-body">
                <h5>${c.Title}</h5>
                <h6>${c.Year}</h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">${c.Actors}</li>
                <li class="list-group-item">${c.Genre}</li>
            </ul>
        </div>
        `;

        // console.log(card);

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

    insertCards(['tt4154756', 'tt4154664', 'tt1201607', 'tt3874544', 'tt0816692', 'tt2911666', 'tt6921996', 'tt2375379' ])
    
    // let card1 = document.createElement('div');
    // let card2 = document.createElement('div');
    // let card3 = document.createElement('div');
    // generateCard('tt4154756').then(card => {
    //     card2.innerHTML = card;
    //     container.appendChild(card2);
    // });
    // generateCard('tt4154664').then(card => {
    //     card3.innerHTML = card;
    //     container.appendChild(card3);
    // });

</script>
@endsection