<?php

namespace Database\Seeders;

//use Illuminate\Database\Seeder;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Random\RandomException;
class ProductsSeeder extends Seeder
{
    public function run():void
    {
        Products::factory()->count(100)->create();
    }
}
