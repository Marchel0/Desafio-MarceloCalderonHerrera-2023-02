<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums    = Album::all();
        return view('dashboard.album.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('dashboard.album.create');
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
            'title' => 'required|string|max:255',
            'release_year' => 'required|numeric',
            'cover_image_url' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePath = $request->file('cover_image_url')->store('albums', 'public');
        $album = new Album();
        $album->title = $validatedData['title'];
        $album->release_year = $validatedData['release_year'];
        $album->cover_image_url = $imagePath;
        $album->save();

        Session::flash('success', 'Álbum agregado exitosamente.');
        return redirect()->route('DashboardAlbum.index');
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
        $album = Album::findOrFail($id);
        return view('dashboard.album.edit', compact('album'));
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
        $album = Album::findOrFail($id);
        // return $request;
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'release_year' => 'required|numeric',
            'cover_image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        // Procesamiento de la imagen si se actualiza
        if ($request->hasFile('cover_image_url')) {
            $imagePath = $request->file('cover_image_url')->store('albums', 'public');
            $album->cover_image_url = $imagePath;
            $dataChanged = true; // Se ha actualizado la imagen
        }
        $dataChanged = (
            $album->title !== $validatedData['title'] ||
            $album->release_year !== $validatedData['release_year']
        );
        $album->title = $validatedData['title'];
        $album->release_year = $validatedData['release_year'];
        $album->save();

        if ($dataChanged) {
            Session::flash('success', 'Los datos se actualizaron exitosamente.');
        } else {
            Session::flash('info', 'No se realizaron cambios en los datos.');
        }
        return redirect()->route('DashboardAlbum.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();
        Session::flash('success', 'Los datos se actualizaron exitosamente.');
        return redirect()->route('DashboardAlbum.index');
    }
}
