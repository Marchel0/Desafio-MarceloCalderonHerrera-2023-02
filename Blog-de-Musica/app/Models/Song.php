<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'duration', 'mp3_file_url',];

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'song_artists', 'song_id', 'artist_id');
    }

    public function musicGenres()
    {
        return $this->belongsToMany(MusicGenre::class, 'song_music_genres', 'song_id', 'music_genre_id');
    }

    // public function likedByUsers()
    // {
    //     return $this->belongsToMany(User::class, 'UserLikesSongs', 'song_id', 'user_id');
    // }

    public function albums()
    {
        return $this->belongsToMany(Album::class, 'album_songs', 'song_id', 'album_id');
    }
}
