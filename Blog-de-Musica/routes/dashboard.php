<?php

use App\Http\Controllers\Dashboard\ArtistController;
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
});
