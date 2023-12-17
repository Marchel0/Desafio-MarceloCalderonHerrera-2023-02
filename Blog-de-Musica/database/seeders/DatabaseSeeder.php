<?php

namespace Database\Seeders;



use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
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
