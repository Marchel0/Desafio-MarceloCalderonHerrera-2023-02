<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Song;
use App\Models\SongArtist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SongArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $song = Song::with('artists')->get();
        return view('dashboard.songartist.index', ['song' => $song]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songs = Song::all();
        $artists = Artist::all();
        return view('dashboard.songartist.create', compact('songs', 'artists'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'song' => 'int',
            'artist' => 'int',
            'artist_role' => 'string|max:255',
        ]);


        SongArtist::create([
            'song_id' => $validatedData['song'],
            'artist_id' => $validatedData['artist'],
            'artist_role' => $validatedData['artist_role'],
        ]);

        Session::flash('success', 'Canción agregada exitosamente.');
        return redirect()->route('DashboardSongArtist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $songartist = SongArtist::findOrFail($id);
        $songs = Song::all();
        $artists = Artist::all();
        return view('dashboard.songartist.edit', compact('songartist', 'songs', 'artists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $songartist = SongArtist::findOrFail($id);
        $validatedData = $request->validate([
            'song_id' => 'int',
            'artist_id' => 'int',
            'artist_role' => 'string|max:255',
        ]);
        $dataChanged = (
            $songartist->song_id != $validatedData['song_id'] ||
            $songartist->artist_id != $validatedData['artist_id'] ||
            $songartist->artist_role !== $validatedData['artist_role']
        );
        if ($dataChanged) {
            $songartist->song_id = $validatedData['song_id'];
            $songartist->artist_id = $validatedData['artist_id'];
            $songartist->artist_role = $validatedData['artist_role'];
            $songartist->save();

            Session::flash('success', 'Los datos se actualizaron exitosamente.');
        } else {
            Session::flash('info', 'No se realizaron cambios en los datos.');
        }
        return redirect()->route('DashboardSongArtist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        $song->delete();
        Session::flash('success', 'Los datos se actualizaron exitosamente.');
        return redirect()->route('DashboardSongArtist.index');
    }
}
