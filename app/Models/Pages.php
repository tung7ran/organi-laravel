<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pages.
 *
 * @package namespace App\Models;
 */
class Pages extends Model implements Transformable
{
    use TransformableTrait, HasApiTokens, HasFactory, Notifiable;
    const TYPE = 'type';
    const NAME_PAGE = 'name_page';
    const ROUTE = 'route';
    const CONTENT = 'content';
    const IMAGE = 'image';
    const BANNER = 'banner';
    const TITLE_H1 = 'title_h1';
    const META_TITLE = 'meta_title';
    const META_DESCRIPTION = 'meta_description';
    const META_KEYWORD = 'meta_keyword';
    const PAGE = 1;
    const LINK = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::TYPE,
        self::NAME_PAGE,
        self::ROUTE,
        self::CONTENT,
        self::IMAGE,
        self::BANNER,
        self::TITLE_H1,
        self::META_TITLE,
        self::META_DESCRIPTION,
        self::META_KEYWORD
    ];

    public static $pageType = [
        self::PAGE   => 'Page',
        self::LINK => 'Link',
    ];
}
