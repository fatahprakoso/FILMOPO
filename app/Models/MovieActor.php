<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieActor extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['movie_id', 'actor_id'];

    function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    function actor()
    {
        return $this->belongsTo(Actor::class);
    }

    public static function getMovieActor($movie_id, $actor_id)
    {
        return MovieActor::where('movie_id', $movie_id)->where('actor_id', $actor_id)->first();
    }

    public static function addMovieActors($movie_id, $actors_id)
    {
        foreach ($actors_id as $key => $actor_id) {
            if (MovieActor::getMovieActor('movie_id', $actor_id) == null) {
                MovieActor::create([
                    'movie_id' => $movie_id,
                    'actor_id' => $actor_id
                ]);
            }
        }
    }
}
