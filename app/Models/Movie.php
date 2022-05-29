<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['movie_id'];

    function watchList()
    {
        return $this->hasMany(WatchList::class);
    }

    function movieActor()
    {
        return $this->hasMany(MovieActor::class);
    }

    function movieGenre()
    {
        return $this->hasMany(MovieGenre::class);
    }

    public static function getMovie($name, $release_dt)
    {
        return Movie::where('name', $name)->where('release_dt', $release_dt)->first();
    }
}
