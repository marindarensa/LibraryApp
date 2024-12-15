<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name, 
            'date_of_birth' => $this->faker->date('Y-m-d', '-18 years'), 
            'grade' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']),
        ];
    }
}
