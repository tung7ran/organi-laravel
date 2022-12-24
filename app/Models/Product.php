<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product.
 *
 * @package namespace App\Models;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const PRODUCT_NAME = 'product_name';
    const PRICE = 'price';
    const DISCOUNT = 'discount';
    const PRODUCT_DESCRIPTION = 'product_description';
    const PRODUCT_IMAGE = 'product_image';
    const CREATE_BY     = 'create_by';
    const UPDATED_BY    = 'updated_by';

    protected $fillable = [
        self::PRODUCT_NAME,
        self::PRICE,
        self::DISCOUNT,
        self::PRODUCT_DESCRIPTION,
        self::PRODUCT_IMAGE,
        self::CREATE_BY,
        self::UPDATED_BY
    ];
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function scopeSearch($query)
    {
        if (request('key')) {
            $key = request('key');
            $query = $query->where('PRODUCT_NAME', 'like', '%' . $key . '%');
        }

        return $query;
    }
}
