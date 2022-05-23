<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieGenre extends Model
{
    use HasFactory;

    public $timestamps = false;

    function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }

    function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }
}
