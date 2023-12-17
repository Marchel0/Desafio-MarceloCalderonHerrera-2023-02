<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $faker->sentence,
            'mp3_file_url' => function () {
                // Lógica para generar un archivo de audio simulado
                $audioContent = generateAudioFile(); // Función que genera el archivo de audio simulado
                $path = 'songs/' . uniqid() . '.mp3'; // Ruta de almacenamiento
                Storage::disk('public')->put($path, $audioContent); // Almacena el archivo simulado

                return $path; // Devuelve la ruta del archivo simulado
            },
        ];
    }
}
