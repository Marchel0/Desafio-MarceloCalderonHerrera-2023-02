<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MusicGenre;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $song = Song::with('musicGenre')->get();
        return view('dashboard.song.index', ['song' => $song]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $musicGenre = MusicGenre::all();
        return response()->view('dashboard.song.create', ['musicGenre' => $musicGenre]);
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
            'title' => 'string|max:255',
            'mp3_file_url' => 'file',
            'artist_music_genres' => 'required',
        ]);

        $mp3_file = $request->file('mp3_file_url')->store('songs', 'public');
        $song = new Song();
        $song->title = $request->title;
        $song->mp3_file_url = $mp3_file;
        $song->save();
        $song->musicGenre()->attach($validatedData['artist_music_genres']);

        Session::flash('success', 'Canción agregada exitosamente.');
        return redirect()->route('DashboardSong.index');
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
        $song = Song::findOrFail($id);
        return view('dashboard.song.edit', compact('song'));
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
        $song = Song::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'string|max:255',
            'mp3_file_url' => 'file',
        ]);


        if (isset($validatedData['title'])) {
            $song->title = $validatedData['title'];
        }


        if ($request->hasFile('mp3_file_url')) {
            $mp3_file = $request->file('mp3_file_url')->store('songs', 'public');
            $song->mp3_file_url = $mp3_file;
        }


        $song->save();

        Session::flash('success', 'Canción actualizada exitosamente.');
        return redirect()->route('DashboardSong.index');
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
        return redirect()->route('DashboardAlbum.index');
    }
}
