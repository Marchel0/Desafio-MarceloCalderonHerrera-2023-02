<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistMusicGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_music_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('music_genre_id');
            $table->unsignedBigInteger('artist_id');
            $table->timestamps();
            $table->foreign('music_genre_id')->references('id')->on('music_genres')->onDelete('cascade');
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist_music_genres');
    }
}
