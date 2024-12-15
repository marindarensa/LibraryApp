<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), 
            'author' => $this->faker->name,      
            'cover' => $this->faker->imageUrl(640, 480, 'books', true, 'Faker'), 
            'code' => $this->faker->unique()->regexify('[A-Z]{5}[0-9]{3}'),   
        ];
    }
}
