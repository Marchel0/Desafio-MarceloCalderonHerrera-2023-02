<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title"=> $this->faker->name(),
            "release_year"=> $this->faker->year($max = "now"),
            "cover_image_url" => $this->faker->name(),
        ];
    }
}
