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
        // echo "sdfsdf";
        $validateDataMovie = $request->validate([
            'title' => 'required|max:250',
            'rated' => 'max:10',
            'runtime' => 'max:50',
            'released' => 'required|max:100',
            'poster' => 'max:255',
        ]);


        $actors = explode(',',$request->actors);
        $genres = explode(',',$request->genre);

        // echo $actors[2];
        // echo Actor::where('name', 'Mark Ruffalo')->first();
        $tes = $actors[2];
        if (Actor::where('name', $tes)->first() != null) {
            echo $tes."(berhasil)";
        } else {
            echo $tes."(gagal)";
        }
        // foreach ($actors as $key => $value) {
        //     if (Actor::where('name', $value)->first() == null) {
        //         $actor_id = Actor::create([
        //             'name' => $value.'|required|max:50',
        //         ])->id;
        //     } else {
        //         $actor_id = Actor::where('name', $value)->first()->id;
        //     }
        // }

        // foreach ($genres as $key => $value) {
        //     if (Genre::where('name', $value)->first() == null) {
        //         $genre_id = Genre::create([
        //             'name' => $value.'|required|max:50',
        //         ])->id;
        //     } else {
        //         $genre_id = Genre::where('name', $value)->first()->id;
        //     }
        // }

        // if (Movie::where('name', $request->title)->Where('release_dt', $request->released)->first() == null) {
        //     $movie_id = Movie::create($validateDataMovie)->id;
        // } else {
        //     $movie_id = Movie::where('name', $request->title)->Where('release_dt', $request->released)->first()->id;
        // }


        // return redirect('/watchlist')->with('success', 'Film ditambahkan!');
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
