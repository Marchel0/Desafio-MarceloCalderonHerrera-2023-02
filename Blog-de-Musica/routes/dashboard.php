<?php

use App\Http\Controllers\Dashboard\AlbumController;
use App\Http\Controllers\Dashboard\ArtistController;
use App\Http\Controllers\Dashboard\SongController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

//Route::resources('dashboard/artist',ArtistController::class);
route::group(['prefix' => '/dashboard'], function () {
    route::group(['prefix' => '/artist'], function () {
        Route::get('', [ArtistController::class, 'index'])->name('DashboardArtist.index');
        Route::get('/create', [ArtistController::class, 'create'])->name('DashboardArtist.create');
        Route::get('/edit/{id}', [ArtistController::class, 'edit'])->name('DashboardArtist.edit');
        Route::post('/guardar', [ArtistController::class, 'store'])->name('DashboardArtist.store');
        Route::post('/actualizar/{id}', [ArtistController::class, 'update'])->name('DashboardArtist.update');
        Route::post('/eliminar/{id}', [ArtistController::class, 'destroy'])->name('DashboardArtist.destroy');
    });
    route::group(['prefix' => '/album'], function () {
        Route::get('', [AlbumController::class, 'index'])->name('DashboardAlbum.index');
        Route::get('/create', [AlbumController::class, 'create'])->name('DashboardAlbum.create');
        Route::get('/edit/{id}', [AlbumController::class, 'edit'])->name('DashboardAlbum.edit');
        Route::post('/guardar', [AlbumController::class, 'store'])->name('DashboardAlbum.store');
        Route::post('/actualizar/{id}', [AlbumController::class, 'update'])->name('DashboardAlbum.update');
        Route::post('/eliminar/{id}', [AlbumController::class, 'destroy'])->name('DashboardAlbum.destroy');
    });
    route::group(['prefix' => '/song'], function () {
        Route::get('', [SongController::class, 'index'])->name('DashboardSong.index');
        Route::get('/create', [SongController::class, 'create'])->name('DashboardSong.create');
        Route::get('/edit/{id}', [SongController::class, 'edit'])->name('DashboardSong.edit');
        Route::post('/guardar', [SongController::class, 'store'])->name('DashboardSong.store');
        Route::post('/actualizar/{id}', [SongController::class, 'update'])->name('DashboardSong.update');
        Route::post('/eliminar/{id}', [SongController::class, 'destroy'])->name('DashboardSong.destroy');
    });
});
