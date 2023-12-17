<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongMusicGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song_music_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('music_genre_id');
            $table->unsignedBigInteger('song_id');
            $table->timestamps();
            $table->foreign('music_genre_id')->references('id')->on('music_genres')->onDelete('cascade');
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('song_music_genres');
    }
}
