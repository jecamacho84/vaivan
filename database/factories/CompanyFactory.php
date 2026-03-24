<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'trade_name' => $this->faker->companySuffix(),
            'document' => $this->faker->unique()->numerify('##############'),
            'is_active' => true,
        ];
    }
}
