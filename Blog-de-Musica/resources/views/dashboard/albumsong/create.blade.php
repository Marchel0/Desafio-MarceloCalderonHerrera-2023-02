@extends('layouts.dashboard')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row justify-content-center"> <!-- Centrar contenido -->
                    <div class="col-lg-6"> <!-- Tamaño del contenedor del formulario -->

                        <div class="card mb-4 mt-5 bg-dark text-white">
                            <h2 class="text-center">CREAR RELACION ALBUMES CON CANCIÓN</h2>
                            <div class="card mb-4 mt-5 bg-dark text-white">
                                <div class="card-body">
                                    <form action="{{ route('DashboardAlbumSong.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3 align-items-center">
                                            <label for="album_id"
                                                class="fw-bold col-sm-3 col-form-label text-end">Album : </label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single js-states form-control"
                                                    name="album_id"
                                                    id="album_id">
                                                    @foreach ($albums as $album)
                                                        <option value="{{ $album->id }}">{{ $album->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label for="song_id"
                                                class="fw-bold col-sm-3 col-form-label text-end">Cancion : </label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single js-states form-control"
                                                    name="song_id"
                                                    id="song_id">
                                                    @foreach ($songs as $song)
                                                        <option value="{{ $song->id }}">{{ $song->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label for="track_number" class="fw-bold col-sm-3 col-form-label text-end">Nombre :
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="track_number" name="track_number" type="number" class="form-control"
                                                    tabindex="1">
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-9 text-center">
                                                <a href="{{ route('DashboardAlbumSong.index') }}"
                                                    class="btn btn-secondary me-2" tabindex="4"><i
                                                        class="fa-solid fa-arrow-left"></i> Atrás</a>
                                                <button type="submit" class="btn btn-primary" tabindex="5"><i
                                                        class="fa-solid fa-floppy-disk"></i> Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
