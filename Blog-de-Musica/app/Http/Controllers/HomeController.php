<?php

namespace App\Http\Controllers;

use App\Models\Album;
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
        $albums = Album::all();
        return view('albums',compact('albums'));
    }
    public function songview()
    {
        $songartists = Song::with('artists')->get();
        $songalbums = Song::with('albums')->get();
        return view('songs',compact('songartists','songalbums'));
    }
    public function artistview()
    {
        $albums = Album::all();
        return view('home',compact('albums'));
    }

    public function getSongs()
    {
        $songs = Song::all();
        return view('songs', compact('songs'));
    }

    public function searchSongs(Request $request)
    {
        $term = $request->input('term');
        $songs = Song::where('title', 'like', '%'.$term.'%')->get();
        return view('songs', compact('songs'));
    }

}
