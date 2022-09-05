<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FolderFileModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'folder_id' => $this->faker->numberBetween(1,5),
            'file_id' => $this->faker->numberBetween(1,5)
        ];
    }

}
