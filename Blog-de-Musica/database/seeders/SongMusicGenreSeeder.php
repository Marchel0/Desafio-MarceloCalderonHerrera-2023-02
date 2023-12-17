<?php

namespace Database\Seeders;

use App\Models\MusicGenre;
use App\Models\Song;
use Illuminate\Database\Seeder;

class SongMusicGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = Song::all();
        $genres = MusicGenre::all();

        $songs->each(function ($song) use ($genres) {
            // Asigna géneros musicales a las canciones de forma aleatoria
            $song->musicGenres()->attach(
                $genres->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
