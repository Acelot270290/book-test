<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->sentence,
            'isbn' => $this->faker->unique()->numerify('##########'),
            'value' => $this->faker->randomFloat(2, 5, 150) 
        ];
    }
}
