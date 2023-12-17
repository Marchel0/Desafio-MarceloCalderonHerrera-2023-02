<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistMusicGenre extends Model
{
    use HasFactory;
    protected $fillable = [
        'musicGenreId',
        'artistId',
    ];

    protected $table = 'artist_music_genres';
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function musicGenre()
    {
        return $this->belongsTo(MusicGenre::class);
    }
}
