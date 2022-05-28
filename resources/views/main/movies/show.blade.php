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
            <x-card id="${id}" : title="${c.Title}" : rated="${c.Rated}" : runtime="${c.Runtime}" : released="${c.Released}" : poster="${c.Poster}" : actors="'${c.Actors}'" : genre="'${c.Genre}'">
                <x-slot name="titleCutted"> ${c.Title.length > 30? `${c.Title.substring(0, 27)}...` : c.Title} </x-slot>

                <x-slot name="actorsCutted">
                    ${c.Actors.length > 37? `${c.Actors.substring(0, 27)}...` : c.Actors}
                </x-slot>

                <x-slot name="genreCutted">
                    ${c.Genre.length > 37? `${c.Genre.substring(0, 27)}...` : c.Genre}
                </x-slot>
            </x-card>
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
        console.log(title + "gell");
        const result = []
        const movies = await fetch(`https://www.omdbapi.com/?apikey=b206be1f&s=${title}&type=movie`)
            .then(r => r.json())
            .catch((e) => console.log(e))
            .finally(() => console.log('finally'));

        movies.Search.forEach(movie => {
            result.push(movie.imdbID)
        });

        return result;
    }

    getMoviesId().then(r => insertCards(r));
</script>
@endsection