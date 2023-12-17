<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //HAce realaciona la tabla de likes y la relacuion user con esta
    // public function likes()
    // {
    //     return $this->belongsToMany(Song::class, 'UserLikesSongs', 'user_id', 'song_id')
    //         ->withTimestamps();
    // }

    // public function favoriteArtists()
    // {
    //     return $this->belongsToMany(Artist::class, 'UserFavoriteArtists', 'user_id', 'artist_id')
    //         ->withTimestamps();
    // }
}
