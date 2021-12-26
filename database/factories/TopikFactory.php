<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TopikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mahasiswa_id' => $this->faker->numberBetween(1,5),
            'dosen1_id' => $this->faker->numberBetween(1,5),
            'dosen2_id' => $this->faker->numberBetween(1,5),
            'kategori_id' => $this->faker->numberBetween(1,3),
            'title' => $this->faker->sentence(),
            'status' => $this->faker->word(),
            'comment' => $this->faker->paragraphs(3,true),
        ];
    }
}
