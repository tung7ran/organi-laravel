<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * Class OrdersDetail.
 *
 * @package namespace App\Models;
 */
class OrdersDetail extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    const ID_ORDER         = 'id_order';
    const ID_PRODUCT       = 'id_product';
    const PRICE            = 'price';
    const QTY              = 'qty';
    const TOTAL            = 'total';
    const DELETED_AT       = 'deleted_at';
    const CREATED_AT       = 'created_at';
    const UPDATED_AT       = 'updated_at';

    protected $fillable = [
        self::ID_ORDER,
        self::ID_PRODUCT,
        self::PRICE,
        self::QTY,
        self::TOTAL,
        self::DELETED_AT,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    protected $CREATE_AT = 'Y-m-d';
    protected $UPDATED_AT = 'Y-m-d';
}
