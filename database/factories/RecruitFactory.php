<?php

namespace Database\Factories;

use App\Models\Recruit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recruit>
 */
class RecruitFactory extends Factory
{
    protected $model = Recruit::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'name_kana' => $this->faker->kanaName(),
            'email' => fake()->email(),
            'birth_date' => fake()->date(),
            'post_code' => fake()->postcode2(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'positions' => 'システム開発部',
            'join_date' => fake()->date(),
            'source' => 'ハローワーク',
            'free_message' => fake()->realText(),
        ];
    }
}
