<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumSong;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlbumSongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $song = Song::with('albums')->get();
        return view('dashboard.albumsong.index', ['song' => $song]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songs = Song::all();
        $albums = Album::all();
        return view('dashboard.albumsong.create', compact('songs', 'albums'));
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
            'album_id' => 'int',
            'song_id' => 'int',
            'track_number' => 'int',
        ]);


        AlbumSong::create([
            'album_id' => $validatedData['album_id'],
            'song_id' => $validatedData['song_id'],
            'track_number' => $validatedData['track_number'],
        ]);

        Session::flash('success', 'Canción agregada exitosamente.');
        return redirect()->route('DashboardAlbumSong.index');
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
        $albumsong = AlbumSong::findOrFail($id);
        $songs = Song::all();
        $albums = Album::all();
        return view('dashboard.albumsong.edit', compact('albumsong', 'songs', 'albums'));
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
        $albumsong = AlbumSong::findOrFail($id);
        $validatedData = $request->validate([
            'album_id' => 'int',
            'song_id' => 'int',
            'track_number' => 'int',
        ]);

        $dataChanged = (
            $albumsong->album_id != $validatedData['album_id'] ||
            $albumsong->song_id != $validatedData['song_id'] ||
            $albumsong->track_number != $validatedData['track_number']
        );
        if ($dataChanged) {
            $albumsong->album_id = $validatedData['album_id'];
            $albumsong->song_id = $validatedData['song_id'];
            $albumsong->track_number = $validatedData['track_number'];
            $albumsong->save();

            Session::flash('success', 'Los datos se actualizaron exitosamente.');
        } else {
            Session::flash('info', 'No se realizaron cambios en los datos.');
        }
        return redirect()->route('DashboardAlbumSong.index');
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
        return redirect()->route('DashboardAlbumSong.index');
    }
}
