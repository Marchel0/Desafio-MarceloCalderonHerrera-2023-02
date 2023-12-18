@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10"> <!-- Ajustamos el tamaño de la columna -->
                <h1 class="text-center fw-bold">Canciones</h1>
                {{-- <div class="search-bar text-center">
                    <input id="searchInput" type="text" placeholder="Buscar canciones...">
                    <button id="searchBtn" type="button">Buscar</button>
                </div> --}}
                <hr>
                <section class="song-blocks">
                    <div class="row">
                        @foreach ($songartists as $index => $song)
                            <div class="col-md-6 text-center mb-3"> <!-- Definimos el tamaño de cada columna -->
                                <div class="border p-5 m-3 w-100 h-100"> <!-- Ajustamos el espaciado de cada canción -->
                                    <!-- Detalles de la canción -->
                                    <h3>{{ $song->title }}</h3>
                                    <p>Artista:
                                        @foreach ($song->artists as $artist)
                                            {{ $artist->name }}
                                        @endforeach
                                    </p>
                                    <div class="col-sm-9 text-center">
                                        @if ($song->mp3_file_url)
                                            <audio controls>
                                                <source src="{{ asset('storage/' . $song->mp3_file_url) }}" type="audio/mpeg">
                                                Tu navegador no soporta la reproducción de audio.
                                            </audio>
                                        @endif
                                    </div>
                                    <p class="mt-1">Generos musicales del Álbum:
                                        <p>@foreach ($song->musicGenre as $musicGenre)
                                            {{ $musicGenre->name }},
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
