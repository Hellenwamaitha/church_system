<?php

namespace Database\Seeders;

use App\Models\Accountusers;
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

        Accountusers::factory()->create([
            'role' => 'admin',
            'name' => 'Hellen admin',
            'email' => 'hellen.admin@example.com',
            'password' => bcrypt('password123'), // Hash the password
        ]);
    }
}
