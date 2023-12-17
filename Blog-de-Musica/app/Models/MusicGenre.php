<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicGenre extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function artistMusicGenres()
    {
        return $this->hasMany(ArtistMusicGenre::class);
    }

    public function artists()
    {
        return $this->hasManyThrough(Artist::class, ArtistMusicGenre::class, 'music_genre_id', 'id', 'id', 'artist_id');
    }

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'song_music_genres', 'music_genre_id', 'song_id');
    }
}
