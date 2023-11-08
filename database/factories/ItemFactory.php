<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "qty" => $this->faker->numberBetween(1, 25),
            "cost" => $this->faker->numberBetween(1000, 50000),
            "product_id" => $this->faker->numberBetween(1, 10),
            "purchase_id" => $this->faker->numberBetween(1, 10),
        ];
    }
}
