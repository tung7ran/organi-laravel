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
 * Class PostCategory.0
 *
 * @package namespace App\Models;
 */
class PostCategory extends Model implements Transformable
{
    use TransformableTrait, HasApiTokens, HasFactory, Notifiable;

    const NAME              = 'name';
    const SLUG              = 'slug';
    const CATEGORY_ID       = 'category_id';
    const CREATE_AT         = 'create_at';
    const UPDATED_AT        = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME,
        self::SLUG,
        self::CATEGORY_ID,
        self::CREATE_AT,
        self::UPDATED_AT
    ];

    // public static $postType = [
    //     self::BASIC   => 'Cơ Bản',
    //     self::PRO => 'Chi tiết',
    // ];

    protected $CREATE_AT = 'Y-m-d';
    protected $UPDATED_AT = 'Y-m-d';
}
