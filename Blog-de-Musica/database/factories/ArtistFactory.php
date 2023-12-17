<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'group_type' => $this->faker->randomElement(['Solista', 'Banda', 'Duo', 'Otro']),
        ];
    }
}
