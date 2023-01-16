<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

/**
 * Class ProductCategory.
 *
 * @package namespace App\Models;
 */
class ProductCategory extends Model implements Transformable
{
    use TransformableTrait, HasFactory, HasApiTokens, Notifiable;

    const NAME     = 'name';
    const SLUG = 'slug';
    const CREATE_BY     = 'create_by';
    const UPDATED_BY    = 'updated_by';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME,
        self::SLUG,
        self::CREATE_BY,
        self::UPDATED_BY,
    ];
}
