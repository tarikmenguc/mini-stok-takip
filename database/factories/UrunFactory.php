<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Urun>
 */
class UrunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "ad" =>$this->faker->words(2,true),
            "stok" =>$this->faker->numberBetween(0,200),
            "fiyat" =>$this->faker->randomFloat(2,10,999),
            "kategori_id"=>Kategori::inRandomOrder()->value("id") ?? Kategori::factory(),
            "user_id"=>User::inRandomOrder()->value("id") ?? User::factory(),
        ];
    }
}
