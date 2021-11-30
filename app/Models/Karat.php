<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $key
 * @property string $title_en
 * @property string $title_ar
 * @property string $created_at
 * @property string $updated_at
 * @property Product[] $products
 */
class Karat extends Model
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
    protected $fillable = ['key', 'title_en', 'title_ar', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function getTitleAttribute()
    {
        return app()->getLocale() == 'en' ? $this->title_en : $this->title_ar;
    }
}
