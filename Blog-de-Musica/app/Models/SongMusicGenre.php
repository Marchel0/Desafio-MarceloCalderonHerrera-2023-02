<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongMusicGenre extends Model
{
    use HasFactory;

    protected $fillable = [
        'songId',
        'musicGenreId',
    ];
}
