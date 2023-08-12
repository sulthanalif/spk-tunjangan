<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Criteria::factory()->count(5)->sequence(
            ['nama' => 'Absensi', 'status' => 1, 'bobot' => '25'],
            ['nama' => 'Masa Kerja', 'status' => 1, 'bobot' => '25'],
            ['nama' => 'Sikap', 'status' => 1, 'bobot' => '20'],
            ['nama' => 'Performa Kerja', 'status' => 1, 'bobot' => '15'],
            ['nama' => 'Kedisiplinan', 'status' => 1, 'bobot' => '15'],
            
        )->create();
    }
}
