<?php

namespace Database\Seeders;

use App\Models\Sub;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sub::factory()->count(25)->sequence(
            ['criteria_id' => 1, 'keterangan' => '>90%', 'value' => '>90', 'nilai' => '5'],
            ['criteria_id' => 1, 'keterangan' => '85-90%', 'value' => 'range(85, 90)', 'nilai' => '4'],
            ['criteria_id' => 1, 'keterangan' => '80-84%', 'value' => 'range(80, 84)', 'nilai' => '3'],
            ['criteria_id' => 1, 'keterangan' => '70-79%', 'value' => 'range(70, 79)', 'nilai' => '2'],
            ['criteria_id' => 1, 'keterangan' => '<70%', 'value' => '<70', 'nilai' => '1'],

            ['criteria_id' => 2, 'keterangan' => '=>5 Tahun', 'value' => '=>5', 'nilai' => '5'],
            ['criteria_id' => 2, 'keterangan' => '4 Tahun', 'value' => '4', 'nilai' => '4'],
            ['criteria_id' => 2, 'keterangan' => '3 Tahun', 'value' => '3', 'nilai' => '3'],
            ['criteria_id' => 2, 'keterangan' => '2 Tahun', 'value' => '2', 'nilai' => '2'],
            ['criteria_id' => 2, 'keterangan' => '1 Tahun', 'value' => '1', 'nilai' => '1'],
      
            ['criteria_id' => 3, 'keterangan' => 'Sangat Baik', 'value' => 'range(90, 100)', 'nilai' => '5'],
            ['criteria_id' => 3, 'keterangan' => 'Baik', 'value' => 'range(75, 89)', 'nilai' => '4'],
            ['criteria_id' => 3, 'keterangan' => 'Cukup', 'value' => 'range(60, 74)', 'nilai' => '3'],
            ['criteria_id' => 3, 'keterangan' => 'Kurang', 'value' => 'range(50, 59)', 'nilai' => '2'],
            ['criteria_id' => 3, 'keterangan' => 'Sangat Kurang', 'value' => '<50', 'nilai' => '1'],
       
            ['criteria_id' => 4, 'keterangan' => 'Sangat Baik', 'value' => 'range(90, 100)', 'nilai' => '5'],
            ['criteria_id' => 4, 'keterangan' => 'Baik', 'value' => 'range(75, 89)', 'nilai' => '4'],
            ['criteria_id' => 4, 'keterangan' => 'Cukup', 'value' => 'range(60, 74)', 'nilai' => '3'],
            ['criteria_id' => 4, 'keterangan' => 'Kurang', 'value' => 'range(50, 59)', 'nilai' => '2'],
            ['criteria_id' => 4, 'keterangan' => 'Sangat Kurang', 'value' => '<50', 'nilai' => '1'],
       
            ['criteria_id' => 5, 'keterangan' => 'Sangat Baik', 'value' => 'range(90, 100)', 'nilai' => '5'],
            ['criteria_id' => 5, 'keterangan' => 'Baik', 'value' => 'range(75, 89)', 'nilai' => '4'],
            ['criteria_id' => 5, 'keterangan' => 'Cukup', 'value' => 'range(60, 74)', 'nilai' => '3'],
            ['criteria_id' => 5, 'keterangan' => 'Kurang', 'value' => 'range(50, 59)', 'nilai' => '2'],
            ['criteria_id' => 5, 'keterangan' => 'Sangat Kurang', 'value' => '<50', 'nilai' => '1'],
        )->create();
    }
}
