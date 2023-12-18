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
                            <h2 class="text-center">CREAR GÉNERO MUSICAL</h2>
                            <div class="card mb-4 mt-5 bg-dark text-white">
                                <div class="card-body">
                                    <form action="{{ route('DashboardMusicGenre.store') }}" method="POST">
                                        @csrf
                                        <div class="row mb-3 align-items-center">
                                            <label for="name" class="fw-bold col-sm-3 col-form-label text-end">Nombre :
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="name" name="name" type="text" class="form-control"
                                                    tabindex="1">
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-9 text-center">
                                                <a href="{{ route('DashboardMusicGenre.index') }}"
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
