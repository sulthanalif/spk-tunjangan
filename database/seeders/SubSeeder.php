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
            ['criteria_id' => 1, 'keterangan' => '>90%', 'nilai' => '5'],
            ['criteria_id' => 1, 'keterangan' => '>84%', 'nilai' => '4'],
            ['criteria_id' => 1, 'keterangan' => '>79%', 'nilai' => '3'],
            ['criteria_id' => 1, 'keterangan' => '>=70%',  'nilai' => '2'],
            ['criteria_id' => 1, 'keterangan' => '<70%', 'nilai' => '1'],

            ['criteria_id' => 2, 'keterangan' => '>=5', 'nilai' => '5'],
            ['criteria_id' => 2, 'keterangan' => '4', 'nilai' => '4'],
            ['criteria_id' => 2, 'keterangan' => '3', 'nilai' => '3'],
            ['criteria_id' => 2, 'keterangan' => '2', 'nilai' => '2'],
            ['criteria_id' => 2, 'keterangan' => '1', 'nilai' => '1'],
      
            ['criteria_id' => 3, 'keterangan' => 'Sangat Baik',  'nilai' => '5'],
            ['criteria_id' => 3, 'keterangan' => 'Baik',  'nilai' => '4'],
            ['criteria_id' => 3, 'keterangan' => 'Cukup',  'nilai' => '3'],
            ['criteria_id' => 3, 'keterangan' => 'Kurang', 'nilai' => '2'],
            ['criteria_id' => 3, 'keterangan' => 'Sangat Kurang', 'nilai' => '1'],
       
            ['criteria_id' => 4, 'keterangan' => 'Sangat Baik',  'nilai' => '5'],
            ['criteria_id' => 4, 'keterangan' => 'Baik',  'nilai' => '4'],
            ['criteria_id' => 4, 'keterangan' => 'Cukup', 'nilai' => '3'],
            ['criteria_id' => 4, 'keterangan' => 'Kurang', 'nilai' => '2'],
            ['criteria_id' => 4, 'keterangan' => 'Sangat Kurang', 'nilai' => '1'],
       
            ['criteria_id' => 5, 'keterangan' => 'Sangat Baik',  'nilai' => '5'],
            ['criteria_id' => 5, 'keterangan' => 'Baik',  'nilai' => '4'],
            ['criteria_id' => 5, 'keterangan' => 'Cukup',  'nilai' => '3'],
            ['criteria_id' => 5, 'keterangan' => 'Kurang', 'nilai' => '2'],
            ['criteria_id' => 5, 'keterangan' => 'Sangat Kurang', 'nilai' => '1'],
        )->create();
    }
}
