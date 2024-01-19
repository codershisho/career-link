<?php

namespace Database\Seeders;

use App\Models\Assessment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Assessment::truncate();

        $data = [
            ['name' => 'S評価', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'A評価', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'B評価', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'C評価', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '不合格', 'created_at' => now(), 'updated_at' => now()],
        ];

        Assessment::insert($data);
    }
}
