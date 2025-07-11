<?php

namespace Database\Seeders;

use App\Models\Urun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UrunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Urun::factory()->count(50)->create();
    }
}
