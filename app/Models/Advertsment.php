<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title_en
 * @property string $title_ar
 * @property string $created_at
 * @property string $updated_at
 * @property Product[] $products
 */
class Advertsment extends Model
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
    protected $fillable = ['image_url'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

}
