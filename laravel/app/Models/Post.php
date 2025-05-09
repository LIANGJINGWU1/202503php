<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;


    protected $fillable = [
        'title',
        'content',
        'author_id',
        'slug',
        'status',
    ];

    public static function create(array $only)
    {
    }

    public function author(): BelongsTo
    {
        // return $this->belongsTo(Author::class, 'author_id', 'id');
        return $this->belongsTo(Author::class);
    }

    public function metadata(): HasOne
    {
        return $this->hasOne(Metadata::class);
    }

    public function tags(): BelongsToMany{
        return $this->belongsToMany(Tag::class,
            'post_tags','post_id', 'tag_id')
            ->withTimestamps();
        // 'post_tags' 是 pivot 表的名称
        // 'post_id' 是 post_tags 表中关联 Post 的外键
        // 'tag_id' 是 post_tags 表中关联 Tag 的外键
        // withTimestamps() 会自动维护 pivot 表中的 created_at 和 updated_at 字段
    }
}
