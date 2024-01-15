<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Recruit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Recruit::factory()->count(10)->create();

        // マスタデータ
        $this->call(PhasesTableSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
