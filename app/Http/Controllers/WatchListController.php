<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\User;
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
        $movies_data = array();
        $user = auth()->user();
        $movies = $user->movie;

        foreach ($movies as $value) {
            $actors_data = array();
            $actors = Movie::find($value->movie_id)->actor;

            foreach ($actors as $actor) {
                array_push($actors_data, $actor->name);
            }

            $genres_data = array();
            $genres = Movie::find($value->movie_id)->genre;

            foreach ($genres as $genre) {
                array_push($genres_data, $genre->name);
            }

            array_push($movies_data, [
                'movie_id' => $value->movie_id,
                'name' => $value->name,
                'length' => $value->length,
                'release_dt' => $value->release_dt,
                'poster' => $value->poster,
                'rated' => $value->rated,
                'genres' => $genres_data,
                'actors' => $actors_data
            ]);
        }
        
        return view('main.watchlist.index', [
            'route' => 'watchlist',
            'movies' => $movies_data
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
            $movie_id = Movie::create($validateDataMovie)['movie_id'];

            $actors = explode(', ', $request->actors);
            $genres = explode(', ', $request->genre);

            $actors_id = Actor::addActors($actors);
            $genres_id = Genre::addGenres($genres);

            Movie::addMovieActors($movie_id, $actors_id);
            Movie::addMovieGenres($movie_id, $genres_id);
        } else {
            $movie_id = Movie::getMovie($request->name, $request->release_dt)['movie_id'];
        }

        // getting the logged user id
        $user_id = auth()->user()->id;

        foreach (User::find($user_id)->movie as $movie) {
            if ($movie->pivot->movie_id == $movie_id) {
                $msg = "Film $request->name sudah ada di watchlist!";
                return redirect()->back()->with('msg', $msg);
            }
        }

        User::find($user_id)->movie()->attach($movie_id);

        $msg = "Film $request->name berhasil ditambahkan!";
        return redirect('/watchlist')->with('success', $msg);
    }
}
