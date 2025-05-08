<?php

namespace App\Models;

use Database\Factories\ArticleTagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articleTag extends Model
{
    /** @use HasFactory<ArticleTagFactory> */
    use HasFactory;
}
