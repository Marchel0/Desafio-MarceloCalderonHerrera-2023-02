@extends('layouts.dashboard')

@section('css')

    <link href="{{ asset('css/tabla.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link type="text/css" rel="stylesheet"
        href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
@endsection

@section('pageTitle', 'Dashboard Artistas')

@section('content')
    <div id="layoutSidenav_content" class="position-relative">
        <main class="position-relative content-margin">
            <div class="container-fluid">
                <h1 class="mb-0">Artistas</h1>
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item active">Dashboard/Artista</li>
                </ol>
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Listado de Artistas</h5>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-danger me-2" id="pdfButton"><i class="fa-solid fa-file-pdf"></i>
                                PDF</button>
                            <button class="btn btn-success me-2" id="excelButton"><i class="fa-solid fa-file-excel"></i>
                                Excel</button>
                            <a class="btn btn-primary" href="{{ route('DashboardArtist.create') }}"><i
                                    class="fa-solid fa-plus"></i> Añadir</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive"> <!-- Agregamos la clase para manejar el scroll -->
                            <table id="artist" class="table table-dark table-striped"
                                style="width: 100%; overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Tipo de artista</th>
                                        <th scope="col">Géneros</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($artists as $artist)
                                        <tr>
                                            <td>{{ $artist->id }}</td>
                                            <td>{{ $artist->name }}</td>
                                            <td>{{ $artist->group_type }}</td>
                                            <td>
                                                @foreach ($artist->musicGenre as $musicGenre)
                                                    {{ $musicGenre->name }},
                                                @endforeach
                                            </td>
                                            <td>
                                                <form action="{{ route('DashboardArtist.destroy', $artist->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-info"
                                                        href="{{ route('DashboardArtist.edit', ['id' => $artist->id]) }}"><i
                                                            class="fa-solid fa-pen-to-square"></i> Editar</a>
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa-solid fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js" type="text/Javascript"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" type="text/Javascript"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js" type="text/Javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js" type="text/Javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js" type="text/Javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" type="text/Javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/Javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/Javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js" type="text/Javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js" type="text/Javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js" type="text/Javascript"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js" type="text/Javascript">
    </script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js" type="text/Javascript">
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#artist').DataTable({
                responsive: true,
                buttons: [{
                        extend: 'excel',
                        filename: 'Excel Artista',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        className: 'btn btn-danger',
                        filename: 'PDF Artista',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                ],
                columnDefs: [{
                        width: '10px',
                        targets: 0
                    }, // Ancho reducido para la primera columna (index 0)
                    {
                        width: '174px',
                        targets: -1
                    } // Ancho reducido para la última columna
                ],

                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-CL.json',
                    lengthMenu: 'Items por pág. <select>' +
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="30">30</option>' +
                        '<option value="40">40</option>' +
                        '<option value="50">50</option>' +
                        '</select>'
                }
            });

            $('#pdfButton').on('click', function() {
                table.button('.buttons-pdf').trigger();
            });

            $('#excelButton').on('click', function() {
                table.button('.buttons-excel').trigger();
            });
        });
    </script>
@endsection
