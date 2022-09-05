<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'encrypted_name' => Str::random(70),
            'extension' => Str::random(3),
            'size' => $this->faker->numberBetween(1,100),
        ];
    }

}
