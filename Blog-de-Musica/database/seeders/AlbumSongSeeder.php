<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Song;

class AlbumSongSeeder extends Seeder
{
    public function run()
    {
        $albums = Album::all();
        $songs = Song::all();
        foreach ($albums as $album) {
            $trackNumber = 1;
            $randomSongs = $songs->random(rand(5, 10));
            foreach ($randomSongs as $song) {
                $album->songs()->attach($song, ['track_number' => $trackNumber]);
                $trackNumber++;
            }
        }
    }
}
