<?php

namespace Database\Seeders;

use App\Models\MusicGenre;
use Illuminate\Database\Seeder;

class MusicGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Rock',
            'Pop',
            'Electrónica',
            'Hip Hop',
            'Jazz',
            'R&B',
            'Reggae',
            'Indie',
            'Soul',
            'Country',
            'Blues',
            'Funk',
            'Clásica',
            'Metal',
            'Disco',
            // Añade más géneros según sea necesario
        ];

        foreach ($genres as $genre) {
            MusicGenre::create([
                'name' => $genre,
            ]);
        }

    }
}
