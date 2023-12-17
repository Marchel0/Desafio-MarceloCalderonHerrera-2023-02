<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'release_year', 'cover_image_url'];

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'album_songs', 'album_id', 'song_id');
    }
}
