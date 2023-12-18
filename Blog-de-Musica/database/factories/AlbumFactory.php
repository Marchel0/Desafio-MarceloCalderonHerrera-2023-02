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
            "release_year"=> $this->faker->dateTimeBetween('-20 years', 'now')->format('d-m-Y'),
            "cover_image_url" => 'albums/'. $this->faker->image(public_path('storage/albums'), 640,480,null,false),
        ];
    }
}
