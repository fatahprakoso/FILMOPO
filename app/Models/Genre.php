<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'genre_id';
    protected $guarded = ['genre_id'];

    function movie()
    {
        return $this->belongsToMany('App\Models\Movie', 'movie_genres', 'genre_id', 'movie_id');
    }

    public static function getGenre($name)
    {
        return Genre::where('name', $name)->first();
    }

    public static function addGenres($genres)
    {
        $genres_id = array();

        foreach ($genres as $key => $value) {
            if (Genre::getGenre($value) == null) {
                $id = Genre::create([
                    'name' => $value
                ])['genre_id'];
                array_push($genres_id, $id);
            } else {
                $id = Genre::getGenre($value)['genre_id'];
                array_push($genres_id, $id);
            }
        }

        return $genres_id;
    }
}
