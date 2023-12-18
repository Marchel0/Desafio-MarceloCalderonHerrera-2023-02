@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10"> <!-- Ajustamos el tamaño de la columna -->
                <h1 class="text-center fw-bold">Álbumes</h1>
                {{-- <div class="search-bar text-center">
                    <input id="searchInput" type="text" placeholder="Buscar canciones...">
                    <button id="searchBtn" type="button">Buscar</button>
                </div> --}}
                <hr>
                <section class="song-blocks">
                    <div class="row">
                        @foreach ($albumsongs as $index => $album)
                            <div class="col-md-4 text-center mb-3"> <!-- Definimos el tamaño de cada columna -->
                                <div class="border p-5 m-3 w-100 h-100"> <!-- Ajustamos el espaciado de cada canción -->
                                    <!-- Detalles de la canción -->
                                    <h3>{{ $album->title }}</h3>
                                    <img src="{{ asset('storage/' . $album->cover_image_url) }}" alt="Album Cover" class="mw-100 mh-100 img-fluid m-2">
                                    <h4>{{ $album->release_year }}</h4>
                                    <p>Canciones del álbum:</p>
                                    <ol>
                                        @foreach ($album->songs as $song)
                                            <li>{{ $song->title }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
