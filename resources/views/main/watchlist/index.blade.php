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

            alert(msg, 'success')
        </script>
    @endif

    <div class="" style="margin-top: 12vh;">
        <div class="d-flex flex-column bd-highlight mb-3 align-items-center justify-content-center">
            @foreach ($movies as $movie)
                <x-watchlist-card movieid="{{ $movie['movie_id'] }}" : name="{{ $movie['name'] }}" :
                    length="{{ $movie['length'] }}" : releasedt="{{ $movie['release_dt'] }}" :
                    poster="{{ $movie['poster'] }}" : rated="{{ $movie['rated'] }}" :
                    watched="{{ $movie['watched'] }}">
                    <x-slot name="genres">
                        @foreach ($movie['genres'] as $genre)
                            <div class="rounded-pill col bg-dark text-info">
                                {{ $genre }}
                            </div>
                        @endforeach
                    </x-slot>
                    <x-slot name="actors">
                        @foreach ($movie['actors'] as $actor)
                            <div class="p-2 bd-highlight">{{ $actor }}</div>
                        @endforeach
                    </x-slot>
                </x-watchlist-card>
            @endforeach
        </div>
    </div>

    <script>
        const card = document.querySelectorAll('.card');

        for (let index = 0; index < card.length; index++) {
            if (index % 2 == 0) {
                card[index].classList.add('animate__animated');
                card[index].classList.add('animate__fadeInRightBig');
            } else {
                card[index].classList.add('animate__animated');
                card[index].classList.add('animate__fadeInLeftBig');
            }
        }

        const watchedSwitchs = document.querySelectorAll('.watched-btn');

        watchedSwitchs.forEach(watchedSwitch => {
            watchedSwitch.addEventListener('click', (e) => {
                const id = e.target.parentElement.querySelector('.id').value;
                const watched = e.target.checked;
                // console.log(watched);
                window.location.href = `watchlist/update/${id}`;
            })
        });
    </script>
@endsection
