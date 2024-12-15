<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Rensa',
            'email' => 'rensa@gmail.com',
            'password' => Hash::make('rensa123')
        ]);

        Book::factory(50)->create(); 
        Student::factory(50)->create();
        Transaction::factory(50)->create();
    }
}
