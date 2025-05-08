<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Metadata extends Model
{
    /** @use HasFactory<\Database\Factories\MetadataFactory> */
    use HasFactory;

    protected $fillable = [
        'like_count',
        'view_count',
        'comment_count',
        'share_count',
        'favorite_count',
        'post_id',
    ];
    public function post():BelongsTo
    {
        return $this->BelongsTo(Post::class);
    }
}
