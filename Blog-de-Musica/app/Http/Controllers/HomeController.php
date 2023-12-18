<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $albums = Album::all();
        return view('home',compact('albums'));
    }
    public function albumsview()
    {
        $albumsongs = Album::with('songs')->get();
        return view('albums',compact('albumsongs'));
    }
    public function songview()
    {
        $songartists = Song::with('artists')->get();
        $songalbums = Song::with('albums')->get();
        return view('songs',compact('songartists','songalbums'));
    }
    public function artistview()
    {
        $songartists = Artist::with('songs')->get();
        return view('artists',compact('songartists'));
    }


}
