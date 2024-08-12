<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accountusers; 

class AccountusersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Accountusers::create([
            'role' => 'admin',
            'name' => 'Hellen admin',
            'email' => 'hellen.admin@example.com',
            'password' => bcrypt('password123'), // Hash the password
        ]);
    }
}
