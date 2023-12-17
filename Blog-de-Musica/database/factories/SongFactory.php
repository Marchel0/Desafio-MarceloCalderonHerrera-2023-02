<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => $this->faker->word(),
            'duration' => $this->faker->time($format = 'i:s', $max = 'now'),
            'mp3_file_url' => $this->faker->name(),
        ];
    }
}
