<?php

namespace Database\Factories;

use App\Models\Sale;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => Book::factory(),
            'sale_date' => fake()->date(),
            'quantity' => fake()->numberBetween(1, 10),
        ];
    }
}
