<?php

namespace App\Http\Controllers;

use App\Models\WatchList;
use App\Models\Movie;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\MovieActor;
use App\Models\MovieGenre;
use Illuminate\Http\Request;

class WatchListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.watchlist.index', [
            'route' => 'watchlist'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating the request
        $validateDataMovie = $request->validate([
            'name' => 'required|max:250',
            'rated' => 'max:10',
            'length' => 'max:50',
            'release_dt' => 'required|max:100',
            'poster' => 'max:255',
        ]);


        // creating the movie and its actors and genres if they don't exist
        if (Movie::getMovie($request->name, $request->release_dt) == null) {
            $movie_id = Movie::create($validateDataMovie)->id;

            $actors = explode(', ', $request->actors);
            $genres = explode(', ', $request->genre);

            $actors_id = Actor::addActors($actors);
            $genres_id = Genre::addGenres($genres);

            MovieActor::addMovieActors($movie_id, $actors_id);
            MovieGenre::addMovieGenres($movie_id, $genres_id);
        } else {
            $movie_id = Movie::getMovie($request->name, $request->release_dt)['movie_id'];
        }

        // getting the logged user id
        $user_id = auth()->user()->id;

        $msg = "Film $request->name berhasil ditambahkan!";

        // creating the watchlist if it doesn't exist
        if (WatchList::getWatchList($movie_id, $user_id) == null) {
            WatchList::create([
                'user_id' => $user_id,
                'movie_id' => $movie_id
            ]);
        } else {
            $msg = "Film $request->name sudah ada di watchlist!";
        }

        return redirect('/watchlist')->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function show(WatchList $watchList)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function edit(WatchList $watchList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WatchList $watchList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function destroy(WatchList $watchList)
    {
        //
    }
}
