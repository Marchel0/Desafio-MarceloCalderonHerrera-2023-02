@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10"> <!-- Ajustamos el tamaño de la columna -->
                <h1 class="text-center fw-bold">Artistas</h1>
                {{-- <div class="search-bar text-center">
                    <input id="searchInput" type="text" placeholder="Buscar canciones...">
                    <button id="searchBtn" type="button">Buscar</button>
                </div> --}}
                <hr>
                <section class="song-blocks">
                    <div class="row">
                        @foreach ($songartists as $index => $artist)
                            <div class="col-md-6 text-center mb-3"> <!-- Definimos el tamaño de cada columna -->
                                <div class="border p-5 m-3 w-100 h-100"> <!-- Ajustamos el espaciado de cada canción -->
                                    <!-- Detalles de la canción -->
                                    <h3>{{ $artist->name }}</h3>
                                    <p class="mt-1">Generos musicales del Artista:
                                        <p>@foreach ($artist->musicGenre as $musicGenre)
                                            {{ $musicGenre->name }},
                                        @endforeach</p>
                                    </p>
                                    <p class="mt-1">Canciones:
                                        <p>@foreach ($artist->songs as $song)
                                            {{ $song->title }},
                                        @endforeach</p>

                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
