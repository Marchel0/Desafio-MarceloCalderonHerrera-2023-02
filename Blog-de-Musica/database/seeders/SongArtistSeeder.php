<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Song;
use App\Models\Artist;


class SongArtistSeeder extends Seeder
{
    public function run()
    {
        $songs = Song::all();
        $artistsCount = Artist::count();
        foreach ($songs as $song) {
            $randomArtistsCount = rand(1, min(3, $artistsCount));
            $randomArtists = Artist::inRandomOrder()->limit($randomArtistsCount)->get();
            foreach ($randomArtists as $artist) {
                $song->artists()->attach($artist, ['artist_role' => $this->getRandomRole()]);
            }
        }
    }
    private function getRandomRole()
    {
        $roles = ['Artista Principal', 'Colaborador Principal', 'Destacado', 'Interprete Solitario', 'Grupo Principal', 'Colaboracion Conjunta', 'Presentacion Especial'];
        return $roles[array_rand($roles)];
    }
}
