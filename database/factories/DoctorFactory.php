<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $expertise = ['GP', 'Derma', 'Psychology', 'Psychiatrist', 'Brain', 'Heart'];
            

        return [
            'first_name' => $this->faker->firstName(),
            'last' => $this->faker->lastName(),
            'age' => $this->faker->numberBetween(24, 75),
            'expertise' => $expertise[array_rand($expertise,1)],
            // 'image' => $this->faker->image(storage_path('app/public/images'),100,100,false),
        ];
    }
}
