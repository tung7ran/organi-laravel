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
 * Class Policy.
 *
 * @package namespace App\Models;
 */
class Policy extends Model implements Transformable
{
    use TransformableTrait, HasApiTokens, HasFactory, Notifiable;

    const NAME              = 'name';
    const SLUG              = 'slug';
    const BANNER             = 'banner';
    const CONTENT           = 'content';
    const STATUS            = 'status';
    const META_TITLE        = 'meta_title';
    const META_DESCRIPTION  = 'meta_description';
    const META_KEYWORD      = 'meta_keyword';
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
        self::BANNER,
        self::CONTENT,
        self::STATUS,
        self::META_TITLE,
        self::META_DESCRIPTION,
        self::META_KEYWORD,
        self::CREATE_AT,
        self::UPDATED_AT
    ];
    
    protected $CREATE_AT = 'Y-m-d';
    protected $UPDATED_AT = 'Y-m-d';
}
