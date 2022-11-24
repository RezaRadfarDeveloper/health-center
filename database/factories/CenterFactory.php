<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $states = ['VIC', 'NSW', 'QLD', 'TAS', 'SA', 'WA'];
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $states[array_rand($states,1)],
            'logo' => $this->faker->image(storage_path('app/public/images'),100,100,false),
        ];
    }
}
