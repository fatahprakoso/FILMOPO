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
        $validateDataMovie = $request->validate([
            'name' => 'required|max:250',
            'rated' => 'max:10',
            'length' => 'max:50',
            'release_dt' => 'required|max:100',
            'poster' => 'max:255',
        ]);


        $actors = explode(', ', $request->actors);
        $genres = explode(', ', $request->genre);


        foreach ($actors as $key => $value) {
            if (Actor::where('name', $value)->first() == null) {
                Actor::create([
                    'name' => $value
                ]);
            } else {
                Actor::where('name', $value)->first();
            }
        }

        foreach ($genres as $key => $value) {
            if (Genre::where('name', $value)->first() == null) {
                Genre::create([
                    'name' => $value
                ]);
            } else {
                Genre::where('name', $value)->first();
            }
        }

        if (Movie::where('name', $request->name)->where('release_dt', $request->release_dt)->first() == null) {
            Movie::create($validateDataMovie);
        } else {
            Movie::where('name', $request->title)->where('release_dt', $request->released)->first();
        }


        return redirect('/watchlist')->with('success', 'Film ditambahkan!');
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
