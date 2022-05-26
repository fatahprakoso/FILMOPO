@extends('layouts.main')

@section('app')
    <h1 class="mt-5">tes</h1>
    <h1 class="mt-5">tes</h1>
    <h1 class="mt-5">tes</h1>
    <h1 class="mt-5">tes</h1>
    <h1 class="mt-5">tes</h1>
    <h1 class="mt-5">tes</h1>
    <h1 class="mt-5">tes</h1>
    <h1 class="mt-5">tes</h1>
    <h1 class="mt-5">tes</h1>
    <h1 class="mt-5">tes</h1>
    <h1 class="mt-5">tes</h1>
    <script>
        fetch('https://www.omdbapi.com/?apikey=b206be1f&t=titan').then(response => response.json()).then(data => console
            .log(data));
    </script>
@endsection
