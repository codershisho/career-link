<?php

namespace Database\Seeders;

use App\Models\Phase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Phase::truncate();

        $data = [
            ['name' => '書類選考', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '一次選考', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '二次選考', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '最終選考', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '内定', 'created_at' => now(), 'updated_at' => now()],
        ];

        Phase::insert($data);
    }
}
