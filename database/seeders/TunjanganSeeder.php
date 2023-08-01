<?php

namespace Database\Seeders;

use App\Models\Tunjangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TunjanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tunjangan::factory()->count(4)->sequence(
            ['keterangan' => '30% Gaji Pokok', 'value' => '=>85', 'nilai' => '=>85'],
            ['keterangan' => '20% Gaji Pokok', 'value' => 'range(70, 84)', 'nilai' => '70-84'],
            ['keterangan' => '10% Gaji Pokok', 'value' => 'range(50, 69)', 'nilai' => '50-69'],
            ['keterangan' => 'Tidak Mendapatkan Tunjangan', 'value' => '<50', 'nilai' => '<50'],
           
        )->create();
    }
}
