<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Movie;
use \App\Models\Actor;
use \App\Models\Genre;
use \App\Models\MovieActor;
use \App\Models\MovieGenre;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Actor
        Actor::create([
            'name' => 'Robert Downey Jr.',
        ]);
        Actor::create([
            'name' => 'Chris Hemsworth',
        ]);
        Actor::create([
            'name' => 'Mark Ruffalo',
        ]);

        // Genre
        Genre::create([
            'name' => 'Action',
        ]);
        Genre::create([
            'name' => 'Adventure',
        ]);
        Genre::create([
            'name' => 'Sci-Fi',
        ]);

        Movie::create([
            'name' => 'Avengers: Infinity War',
            'length' => '149 min',
            'release_dt' => '27 Apr 2018',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMjMxNjY2MDU1OV5BMl5BanBnXkFtZTgwNzY1MTUwNTM@._V1_SX300.jpg',
            'rated' => 'PG-13'
        ]);
    }
}
