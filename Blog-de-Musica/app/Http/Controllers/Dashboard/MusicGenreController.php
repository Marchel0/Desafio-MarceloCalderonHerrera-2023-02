<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MusicGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MusicGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicGenre = MusicGenre::all();
        return view('dashboard.musicgenre.index', ['musicGenre' => $musicGenre]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('dashboard.musicgenre.create');
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
        ]);

        $musicGenre = new MusicGenre();
        $musicGenre->name = $request->name;
        $musicGenre->save();

        Session::flash('success', 'Género musical agregado exitosamente.');
        return redirect()->route('DashboardMusicGenre.index');
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
        $musicGenre = MusicGenre::findOrFail($id);
        return view('dashboard.musicgenre.edit', compact('musicGenre'));
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
        $musicGenre = MusicGenre::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $dataChanged = (
            $musicGenre->name !== $validatedData['name']
        );

        //Mensaje de éxito basado en si los datos han cambiado
        if ($dataChanged) {
            $musicGenre->name = $validatedData['name'];
            $musicGenre->save();
            Session::flash('success', 'Los datos se actualizaron exitosamente.');
        } else {
            Session::flash('info', 'No se realizaron cambios en los datos.');
        }
        return redirect()->route('DashboardMusicGenre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $musicGenre = MusicGenre::findOrFail($id);
        $musicGenre->delete();
        Session::flash('success', 'El género musicla se elimino exitosamente.');
        return redirect()->route('DashboardMusicGenre.index');
    }
}
