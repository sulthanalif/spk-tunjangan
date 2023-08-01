<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create(
            ['nama' => 'Number'],
            
        );
        Type::create(
            
            ['nama' => 'Opsional'],
        );
        Status::create(
            ['nama' => 'Benefit'],
            
        );
        Status::create(
            
            ['nama' => 'Cost'],
        );
    }
}
