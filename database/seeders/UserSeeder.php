<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        $data = [
            ['name' => 'AAA', 'email' => 'aaa@example.com', 'password' => Hash::make('hogehoge'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'BBB', 'email' => 'bbb@example.com', 'password' => Hash::make('hogehoge'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'CCC', 'email' => 'ccc@example.com', 'password' => Hash::make('hogehoge'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'DDD', 'email' => 'ddd@example.com', 'password' => Hash::make('hogehoge'), 'created_at' => now(), 'updated_at' => now()],
        ];

        User::insert($data);
    }
}
