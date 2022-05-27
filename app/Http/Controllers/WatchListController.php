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

        $msg = "Film $request->name berhasil ditambahkan!";

        // creating the movie if it doesn't exist
        if (Movie::where('name', $request->name)->where('release_dt', $request->release_dt)->first() == null) {
            $movie_id = Movie::create($validateDataMovie)->id;

            $actors = explode(', ', $request->actors);
            $genres = explode(', ', $request->genre);

            $actors_id = array();
            $genres_id = array();

            foreach ($actors as $key => $value) {
                if (Actor::where('name', $value)->first() == null) {
                    $id = Actor::create([
                        'name' => $value
                    ])->id;
                    array_push($actors_id, $id);
                } else {
                    $id = Actor::where('name', $value)->first()['actor_id'];
                    array_push($actors_id, $id);
                }
            }

            foreach ($genres as $key => $value) {
                if (Genre::where('name', $value)->first() == null) {
                    $id = Genre::create([
                        'name' => $value
                    ])->id;
                    array_push($genres_id, $id);
                } else {
                    $id = Genre::where('name', $value)->first()['genre_id'];
                    array_push($genres_id, $id);
                }
            }

            foreach ($actors_id as $key => $actor_id) {
                if (MovieActor::where('movie_id', $movie_id)->where('actor_id', $actor_id)->first() == null) {
                    MovieActor::create([
                        'movie_id' => $movie_id,
                        'actor_id' => $actor_id
                    ]);
                }
            }

            foreach ($genres_id as $key => $genre_id) {
                if (MovieGenre::where('movie_id', $movie_id)->where('genre_id', $genre_id)->first() == null) {
                    MovieGenre::create([
                        'movie_id' => $movie_id,
                        'genre_id' => $genre_id
                    ]);
                }
            }
        } else {
            $movie_id = Movie::where('name', $request->name)->where('release_dt', $request->release_dt)->first()['movie_id'];
        }

        // getting the logged user id
        $user_id = auth()->user()->id;

        // creating the watchlist if it doesn't exist
        if (WatchList::where('user_id', $user_id)->where('movie_id', $movie_id)->first() == null) {
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
