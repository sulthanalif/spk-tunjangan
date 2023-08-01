<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alternative::factory()->count(5)->sequence(
            ['nama' => 'Zahra', 'absensi' => '90', 'masa_kerja' => '5', 'sikap' => 'Sangat Baik', 'performa_kerja' => 'Baik', 'kedisiplinan' => 'Baik'],
            ['nama' => 'Dinda', 'absensi' => '70', 'masa_kerja' => '3', 'sikap' => 'Baik', 'performa_kerja' => 'Sangat Baik', 'kedisiplinan' => 'Sangat Baik'],
            ['nama' => 'Ikhsan', 'absensi' => '80', 'masa_kerja' => '4', 'sikap' => 'Baik', 'performa_kerja' => 'Sangat Baik', 'kedisiplinan' => 'Sangat Baik'],
            ['nama' => 'Budi', 'absensi' => '80', 'masa_kerja' => '1', 'sikap' => 'Kurang', 'performa_kerja' => 'Baik', 'kedisiplinan' => 'Cukup'],
            ['nama' => 'Arif', 'absensi' => '50', 'masa_kerja' => '4', 'sikap' => 'Baik', 'performa_kerja' => 'Kurang', 'kedisiplinan' => 'Cukup'],
        )->create();
    }
}
