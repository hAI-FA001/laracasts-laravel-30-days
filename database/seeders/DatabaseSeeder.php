<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'test@example.com',
        ]);

        // run JobSeeder too, helpful in larger projects
        $this->call(JobSeeder::class);
    }

    // factories are for quickly scaffolding data for tests
    // seeders can trigger 1 or more factories
    // seeders can directly interface with the database facade or eloquent models
    // but it's usually easier to use factories
}
