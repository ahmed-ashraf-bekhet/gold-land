<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * @property integer $id
 * @property integer $department_id
 * @property integer $category_id
 * @property integer $karat_id
 * @property float $weight
 * @property float $effort_price
 * @property float $stone_price
 * @property float $stone_weight
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 * @property Department $department
 * @property Karat $karat
 * @property ProductOrder[] $productOrders
 */
class Product extends Model  implements HasMedia
{
    use HasMediaTrait;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['department_id', 'title_en', 'title_ar', 'category_id', 'karat_id', 'weight', 'effort_price', 'stone_price', 'stone_weight', 'image_url', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function karat()
    {
        return $this->belongsTo('App\Models\Karat');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productOrders()
    {
        return $this->hasMany('App\Models\ProductOrder');
    }
}
