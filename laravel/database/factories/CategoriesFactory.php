<?php

namespace Database\Factories;

use app\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriesFactory extends  Factory
{
    public function definition() :array
    {
        //生成唯一单词作为分类名称
        return [
            'name' => $this->faker->unique()->word,
        ];
    }
}
