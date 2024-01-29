<?php

namespace Database\Seeders;

use App\Models\Reason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reason::truncate();

        $data = [
            ['name' => '未選択', 'created_at' => now(), 'updated_at' => now()],
        ];

        Reason::insert($data);
    }
}
