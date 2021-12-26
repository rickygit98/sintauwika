<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'skripsi_id' => $this->faker->numberBetween(1,5),
            'tgl_seminar' => $this->faker->dateTime(),
            'tgl_sidang' => $this->faker->dateTime(),
        ];
    }
}
