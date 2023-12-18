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
                            <h2 class="text-center">CREAR RELACION ARTISTAS CON CANCIÓN</h2>
                            <div class="card mb-4 mt-5 bg-dark text-white">
                                <div class="card-body">
                                    <form action="{{ route('DashboardSongArtist.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3 align-items-center">
                                            <label for="song"
                                                class="fw-bold col-sm-3 col-form-label text-end">Cancion : </label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single js-states form-control"
                                                    name="song"
                                                    id="song">
                                                    @foreach ($songs as $song)
                                                        <option value="{{ $song->id }}">{{ $song->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label for="artist"
                                                class="fw-bold col-sm-3 col-form-label text-end">Artista : </label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single js-states form-control"
                                                    name="artist"
                                                    id="artist">
                                                    @foreach ($artists as $artist)
                                                        <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label for="artist_role"
                                                class="fw-bold col-sm-3 col-form-label text-end">Rol artista : </label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single form-control" name="artist_role"
                                                    id="artist_role">
                                                    <option value="Artista Principal">Artista Principal</option>
                                                    <option value="Colaborador Principal">Colaborador Principal</option>
                                                    <option value="Destacado">Destacado</option>
                                                    <option value="Interprete Solitario">Interprete Solitario</option>
                                                    <option value="Grupo Principal">Grupo Principal</option>
                                                    <option value="Colaboracion Conjunta">Colaboración Conjunta</option>
                                                    <option value="Presentacion Especial">Presentación Especial</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-9 text-center">
                                                <a href="{{ route('DashboardSongArtist.index') }}"
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
