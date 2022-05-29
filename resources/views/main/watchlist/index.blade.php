@extends('layouts.main')

@section('app')

<style>
    body {
        background-color: white;
    }
    /* .first-col {

    } */
    /* .sec-col {

    } */
    /* .third-col {

    } */
</style>

<div class="" style="margin-top: 12vh;">
    <div class="d-flex flex-column bd-highlight mb-3">
        @foreach ($movies as $movie)
            <x-watchlist-card movieid="{{$movies[0]['movie_id']}}" : name="{{$movie['name']}}" : length="{{$movie['length']}}" : releasedt="{{$movie['release_dt']}}" : poster="{{$movie['poster']}}" : rated="{{$movie['rated']}}">
                <x-slot name="genres">
                    @foreach ($movie['genres'] as $genre)
                        <div class="rounded-pill col bg-dark text-info">
                            $genre
                        </div>
                    @endforeach
                </x-slot>
                <x-slot name="actors">
                    @foreach ($movie['actors'] as $actor)                    
                        <div class="p-2 bd-highlight">{{$actor}}</div>
                    @endforeach
                </x-slot>
            </x-watchlist-card>
        @endforeach
    </div>
</div>

@endsection