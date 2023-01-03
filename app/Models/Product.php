<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    const NAME = 'name';
    const SLUG = 'slug';
    const DESCRIPTION = 'desc';
    const CONTENT = 'content';
    const PRICE = 'price';
    const SALE_PRICE = 'sale_price';
    const SALE = 'sale';
    const IMAGE = 'image';
    const IMAGE_CONTENT = 'image_content';
    const IMAGE_INGREDIENT = 'image_ingredient';
    const IMAGE_USE = 'image_use';
    const MORE_IMAGE = 'more_image';
    const HOT = 'hot';
    const IS_SALE = 'is_sale';
    const STATUS = 'status';
    const META_TITLE = 'meta_title';
    const META_DESCRIPTION = 'meta_description';
    const META_KEYWORD = 'meta_keyword';
    const CREATE_AT     = 'create_at';
    const UPDATED_AT   = 'updated_at';

    protected $fillable = [
        self::NAME,
        self::SLUG,
        self::DESCRIPTION,
        self::CONTENT,
        self::PRICE,
        self::SALE_PRICE,
        self::SALE,
        self::IMAGE,
        self::IMAGE_CONTENT,
        self::IMAGE_INGREDIENT,
        self::IMAGE_USE,
        self::MORE_IMAGE,
        self::HOT,
        self::IS_SALE,
        self::STATUS,
        self::META_TITLE,
        self::META_DESCRIPTION,
        self::META_KEYWORD,
        self::CREATE_AT,
        self::UPDATED_AT,
    ];

}
