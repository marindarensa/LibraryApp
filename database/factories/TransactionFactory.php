<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Transaction;
use App\Models\Student;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'student_id' => Student::inRandomOrder()->first()->id, 
            'code' => $this->faker->unique()->regexify('[A-Za-z0-9]{8}'), 
            'amount' => $this->faker->numberBetween(1, 10), 
            'status' => $this->faker->randomElement([0, 1]), 
        ];
    }
}
