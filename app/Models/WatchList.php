<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchList extends Model
{
    use HasFactory;

    public $timestamps = false;

    function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }
}
