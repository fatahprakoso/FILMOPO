<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'actor_id';
    protected $guarded = ['actor_id'];

    function movie()
    {
        return $this->belongsToMany('App\Models\Movie', 'movie_actors', 'actor_id', 'movie_id');
    }

    public static function getActor($name)
    {
        return Actor::where('name', $name)->first();
    }

    public static function addActors($actors)
    {
        $actors_id = array();

        foreach ($actors as $key => $value) {
            if (Actor::getActor($value) == null) {
                $id = Actor::create([
                    'name' => $value
                ])['actor_id'];
                array_push($actors_id, $id);
            } else {
                $id = Actor::getActor($value)['actor_id'];
                array_push($actors_id, $id);
            }
        }

        return $actors_id;
    }
}
