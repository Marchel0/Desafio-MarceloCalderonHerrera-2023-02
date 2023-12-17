<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumSong extends Model
{
    use HasFactory;
    protected $fillable = [
        'album_id',
        'song_id',
        'track_number',
    ];
}
