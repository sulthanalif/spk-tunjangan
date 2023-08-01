<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // AuthSeeder::class,
            UserSeeder::class,
            AlternativeSeeder::class,
            TypeStatusSeeder::class,
            CriteriaSeeder::class,
            SubSeeder::class,
            TunjanganSeeder::class,
            // MasterCostSeeder::class,
            // CostSeeder::class,
        ]);
        
    }
}
