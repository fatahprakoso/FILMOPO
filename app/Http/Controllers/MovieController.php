<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.movies.index', [
            'route' => 'movies',
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        return view('main.movies.show', [
            'route' => 'movies',
            'search' => $title,
        ]);
    }
}
