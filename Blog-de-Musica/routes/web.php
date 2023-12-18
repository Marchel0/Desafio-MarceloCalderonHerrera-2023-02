<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Auth::routes();

require __DIR__ .'/dashboard.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/albums', [App\Http\Controllers\HomeController::class, 'albumsview'])->name('albums');
Route::get('/songs', [App\Http\Controllers\HomeController::class, 'songview'])->name('songs');
Route::get('/artists', [App\Http\Controllers\HomeController::class, 'artistview'])->name('artists');
Route::get('/get-songs', [App\Http\Controllers\HomeController::class, 'getSongs']);
Route::get('/search-songs', [App\Http\Controllers\HomeController::class, 'searchSongs']);

