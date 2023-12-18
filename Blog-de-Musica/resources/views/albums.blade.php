@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Pedestal con los tres álbumes principales -->
        <section class="top-albums text-cente mb-5">
            <!-- Podio con los tres primeros álbumes -->
            <h3>Top Albumes</h3>
            <div class="podium">
                <div class="album">
                    <label class=" fw-bold col-sm-3 col-form-label text-end">{{ $albums->random()->title }}</label>
                </div>
                <div class="album">
                    <!-- Detalles del álbum 2 (Top 2) -->
                </div>
                <div class="album">
                    <!-- Detalles del álbum 3 (Top 3) -->
                </div>
            </div>

        <!-- Línea divisoria -->
        <hr>

        <!-- Sección de los siete álbumes más populares -->
        <section class="popular-albums text-center mt-5">
            <h2>Álbumes Populares</h2>
            <!-- Aquí puedes mostrar los siete álbumes más populares -->
            <!-- Por ejemplo: -->
            <div class="album">
                <!-- Detalles del álbum 1 -->
            </div>
            <div class="album">
                <!-- Detalles del álbum 2 -->
            </div>
            <!-- ... Repite para los demás álbumes -->
        </section>
        </div>
    </div>
</div>
@endsection
