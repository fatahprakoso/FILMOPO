<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieGenre extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['movie_id', 'genre_id'];

    function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }

    function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public static function getMovieGenre($movie_id, $genre_id)
    {
        return MovieGenre::where('movie_id', $movie_id)->where('genre_id', $genre_id)->first();
    }

    public static function addMovieGenres($movie_id, $genres_id)
    {
        foreach ($genres_id as $key => $genre_id) {
            if (MovieGenre::getMovieGenre($movie_id, $genre_id) == null) {
                MovieGenre::create([
                    'movie_id' => $movie_id,
                    'genre_id' => $genre_id
                ]);
            }
        }
    }
}
