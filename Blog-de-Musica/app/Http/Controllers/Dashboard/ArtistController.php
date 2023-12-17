<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\MusicGenre;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::with('musicGenre')->get();
        return view('dashboard.artist.index', ['artists' => $artists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $musicGenre = MusicGenre::all();
        return response()->view('dashboard.artist.create', ['musicGenre' => $musicGenre]);
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
            'name' => 'required|string|max:255',
            'group_type' => 'required|in:Solista,Banda,Duo,Otro',
            'artist_music_genres' => 'array',
        ]);

        $artist = Artist::create([
            'name' => $validatedData['name'],
            'group_type' => $validatedData['group_type'],
        ]);
        $artist->musicGenre()->attach($validatedData['artist_music_genres']);

        return redirect()->route('DashboardArtist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = Artist::findOrFail($id);
        $musicGenre = MusicGenre::all();
        $artistMusicGenres = $artist->musicGenre->pluck('id')->toArray();
        return view('dashboard.artist.edit', compact('artist', 'musicGenre', 'artistMusicGenres'));
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
        $artist = Artist::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'group_type' => 'required|in:Solista,Banda,Duo,Otro',
            'artist_music_genres' => 'array',
        ]);
        $artist->name = $validatedData['name'];
        $artist->group_type = $validatedData['group_type'];
        $artist->save();

        if (isset($validatedData['artist_music_genres'])) {
            $artist->musicGenre()->sync($validatedData['artist_music_genres']);
        } else {
            $artist->musicGenre()->detach();
        }

        return redirect()->route('DashboardArtist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();
        return redirect()->route('DashboardArtist.index');
    }
}
