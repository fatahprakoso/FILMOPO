@extends('layouts.main')

@section('app')
    @if (Session::has('msg'))
        <div id="liveAlertPlaceholder" style="position: fixed; z-index:50; top:70px; width:100%"
            value="{{ Session::get('msg') }}"></div>
        <script>
            const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
            const msg = alertPlaceholder.getAttribute('value')

            function alert(message, type) {
                const wrapper = document.createElement('div')
                wrapper.innerHTML = [
                    `<div class="text-center center-block alert alert-${type} alert-dismissible" role="alert" style="margin: auto; width: 50%">
                       <div>${message}</div>
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
                ].join('')

                alertPlaceholder.append(wrapper);
            };

            alert(msg, 'danger')
        </script>
    @endif

    <x-card-container></x-card-container>

    <script>
        const container = document.querySelector('.card-container');
        async function generateCard(id) {
            const c = await fetch(`http://www.omdbapi.com/?apikey=b206be1f&i=${id}`)
                .then(r => r.json())
                .catch((e) => console.log(e))
                .finally(() => console.log('finally'));

            let card =
                `<x-card id="${id}" : title="${c.Title}" : rated="${c.Rated}" : runtime="${c.Runtime}" : released="${c.Released}" : poster="${c.Poster}" : actors="'${c.Actors}'" : genre="'${c.Genre}'">

                    <x-slot name="titleCutted"> ${c.Title.length > 30? `${c.Title.substring(0, 27)}...` : c.Title} </x-slot>

                    <x-slot name="actorsCutted">
                        ${c.Actors.length > 37? `${c.Actors.substring(0, 27)}...` : c.Actors}
                    </x-slot>

                    <x-slot name="genreCutted">
                        ${c.Genre.length > 37? `${c.Genre.substring(0, 27)}...` : c.Genre}
                    </x-slot>
                </x-card>`;

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
        ]);
    </script>
@endsection
