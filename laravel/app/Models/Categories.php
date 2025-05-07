<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CategoriesFactory;


    class Categories extends Model{
        use HasFactory;

        public static function where(string $string, int $int)
        {
        }
    }
