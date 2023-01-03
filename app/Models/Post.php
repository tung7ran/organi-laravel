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
 * Class Post.
 *
 * @package namespace App\Models;
 */
class Post extends Model implements Transformable
{
    use TransformableTrait, HasApiTokens, HasFactory, Notifiable;

    const NAME = 'name';
    const SLUG = 'slug';
    const DESCRIPTION = 'desc';
    const CONTENT = 'content';
    const IMAGE = 'image';
    const TYPE = 'type';
    const BASIC = 1;
    const PRO = 2;
    const HOT = 'hot';
    const STATUS = 'status';
    const USER_ID = 'user_id';
    const META_TITLE = 'meta_title';
    const META_DESCRIPTION = 'meta_description';
    const META_KEYWORD = 'meta_keyword';
    const CREATE_AT     = 'create_at';
    const UPDATED_AT   = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME,
        self::SLUG,
        self::DESCRIPTION,
        self::CONTENT,
        self::IMAGE,
        self::TYPE,
        self::HOT,
        self::STATUS,
        self::USER_ID,
        self::META_TITLE,
        self::META_DESCRIPTION,
        self::META_KEYWORD,
        self::CREATE_AT,
        self::UPDATED_AT
    ];

    public static $postType = [
        self::BASIC   => 'Cơ Bản',
        self::PRO => 'Chi tiết',
    ];

    protected $CREATE_AT = 'Y-m-d';
    protected $UPDATED_AT = 'Y-m-d';

}
