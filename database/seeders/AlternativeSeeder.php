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
            ['nama' => 'Zahra'],
            ['nama' => 'Dinda'],
            ['nama' => 'Ikhsan'],
            ['nama' => 'Budi' ],         
            ['nama' => 'Arif' ],)->create();
    }
}
