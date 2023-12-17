<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\MusicGenre;
use Illuminate\Database\Seeder;

class ArtistMusicGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artists = Artist::all();
        $genres = MusicGenre::all();

        $artists->each(function ($artist) use ($genres) {
            // Asigna géneros musicales a los artistas de forma aleatoria
            $artist->musicGenres()->attach(
                $genres->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
