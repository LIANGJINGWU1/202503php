<?php

namespace App\Models;

use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    /** @use HasFactory<TagFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
    //多对多关系，
    //Tag::class	目标模型：你要关联的标签
    //'post_tags'	中间表（多对多）
    //'post_id'	当前模型在中间表中的外键（Post）
    //'tag_id'	目标模型在中间表中的外键（Tag）
    public function posts(): BelongsToMany
    {
        //withTimestamps();
        //用于**多对多关系（belongsToMany）**中，告诉 Laravel：
        //    在操作中间表时，自动维护时间戳字段 created_at 和 updated_at。
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id')->withTimestamps();
    }

}
