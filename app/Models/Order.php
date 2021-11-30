<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property float $karat_price
 * @property float $total
 * @property float $knet
 * @property float $total_knet
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property ProductOrder[] $productOrders
 */
class Order extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'payment', 'total', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productOrders()
    {
        return $this->hasMany('App\Models\ProductOrder');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_orders');
    }
}
