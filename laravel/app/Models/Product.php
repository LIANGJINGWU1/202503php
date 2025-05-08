<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Product extends Model
{
    /**
     *
     *
     * @property int $id
     * @property string $name 名称
     * @property string $price 价格
     * @property int $category_id 分类ID
     * @property int $stock 库存
     * @property int $status 状态 1:上架 0:下架
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static ProductsFactory factory($count = null, $state = [])
     * @method static Builder<static>|Products newModelQuery()
     * @method static Builder<static>|Products newQuery()
     * @method static Builder<static>|Products query()
     * @method static Builder<static>|Products whereCategoryId($value)
     * @method static Builder<static>|Products whereCreatedAt($value)
     * @method static Builder<static>|Products whereId($value)
     * @method static Builder<static>|Products whereName($value)
     * @method static Builder<static>|Products wherePrice($value)
     * @method static Builder<static>|Products whereStatus($value)
     * @method static Builder<static>|Products whereStock($value)
     * @method static Builder<static>|Products whereUpdatedAt($value)
     * @property Carbon|null $deleted_at
     * @property-read Categories|null $category
     * @method static Builder<static>|Products onlyTrashed()
     * @method static Builder<static>|Products whereDeletedAt($value)
     * @method static Builder<static>|Products withTrashed()
     * @method static Builder<static>|Products withoutTrashed()
     * @mixin Eloquent
     */
    /** @use HasFactory<ProductFactory> */
    use HasFactory,softDeletes;
//当前模型属于某个 Categories 模型（分类）
    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}
