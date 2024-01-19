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
            ['name' => 'S評価', 'color_code' => '#FF6D00', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'A評価', 'color_code' => '#D84315', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'B評価', 'color_code' => '#33691E', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'C評価', 'color_code' => '#3E2723', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '不合格', 'color_code' => '#263238', 'created_at' => now(), 'updated_at' => now()],
        ];

        Assessment::insert($data);
    }
}
