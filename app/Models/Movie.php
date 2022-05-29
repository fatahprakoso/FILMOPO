<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'movie_id';
    protected $guarded = ['movie_id'];

    function actor()
    {
        return $this->belongsToMany('App\Models\Actor', 'movie_actors', 'movie_id', 'actor_id');
    }

    function genre()
    {
        return $this->belongsToMany('App\Models\Genre', 'movie_genres', 'movie_id', 'genre_id');
    }

    function user()
    {
        return $this->belongsToMany('App\Models\User', 'watch_lists', 'movie_id', 'user_id');
    }

    public static function getMovie($name, $release_dt)
    {
        return Movie::where('name', $name)->where('release_dt', $release_dt)->first();
    }

    public static function addMovieActors($movie_id, $actors_id)
    {
        $movie = Movie::find($movie_id);
        foreach ($actors_id as $value) {
            $movie->actor()->attach($value);
        }
    }

    public static function addMovieGenres($movie_id, $genres_id)
    {
        $movie = Movie::find($movie_id);
        foreach ($genres_id as $value) {
            $movie->genre()->attach($value);
        }
    }
}
