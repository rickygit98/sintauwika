<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SkripsiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'topik_id' => $this->faker->numberBetween(1,5),
            'subject' => $this->faker->paragraphs(3,true),
            'comment' => $this->faker->paragraphs(3,true),
            'status' => $this->faker->word(),
            
        ];
    }
}
