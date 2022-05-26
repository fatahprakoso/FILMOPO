<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['actor_id'];

    function movieActor()
    {
        return $this->hasMany('App\Models\MovieActor');
    }
}
