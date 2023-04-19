<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FeatureFactory extends Factory
{
    public function definition(): array
    {
        return [
            'air_condition' => fake()->boolean(),
            'central_heating' => fake()->boolean(),
            'furniture' => [
                fake()->name ,
                fake()->name ,
                fake()->name ,
                fake()->name ,
                fake()->name ,
            ],
        ];
    }
}
