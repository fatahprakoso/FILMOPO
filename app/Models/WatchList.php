<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchList extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['movie_id', 'user_id'];

    function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }

    public static function getWatchList($movie_id, $user_id)
    {
        return WatchList::where('movie_id', $movie_id)->where('user_id', $user_id)->first();
    }
}
