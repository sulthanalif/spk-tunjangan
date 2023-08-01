<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(2)->sequence(
            ['name' => 'Admin', 'username' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('123')],
            ['name' => 'HRD', 'username' => 'hrd', 'email' => 'hrd@gmail.com', 'password' => bcrypt('123')],
        )->create();
        // User::factory()->count(10)->create();
    }
}
