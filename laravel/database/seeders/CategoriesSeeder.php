<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        Categories::factory()->count(10)->create();
    }
}
