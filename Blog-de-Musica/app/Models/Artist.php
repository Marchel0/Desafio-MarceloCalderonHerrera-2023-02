<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'group_type',
    ];

    public function artistMusicGenres()
    {
        return $this->hasMany(ArtistMusicGenre::class);
    }
    public function musicGenre()
    {
        return $this->belongsToMany(MusicGenre::class, 'artist_music_genres', 'artist_id', 'music_genre_id');
    }
    public function songs()
    {
        return $this->belongsToMany(Song::class, 'song_artists', 'artist_id', 'song_id');
    }

    // public function favoriteOfUsers()
    // {
    //     return $this->belongsToMany(User::class, 'UserFavoriteArtists', 'artist_id', 'user_id');
    // }
}
