<?php

namespace Database\Seeders;



use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Storage::deleteDirectory('public/albums');
        Storage::makeDirectory('public/albums');
        Storage::deleteDirectory('public/songs');
        Storage::makeDirectory('public/songs');

        $this->call(UserSeeder::class);
        $this->call(ArtistSeeder::class);
        $this->call(SongSeeder::class);
        $this->call(AlbumSeeder::class);
        $this->call(SongArtistSeeder::class);
        $this->call(AlbumSongSeeder::class);
        $this->call(MusicGenreSeeder::class);
        $this->call(SongMusicGenreSeeder::class);
        $this->call(ArtistMusicGenreSeeder::class);
    }
}
