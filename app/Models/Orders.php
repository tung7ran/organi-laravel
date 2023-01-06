<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
/**
 * Class Orders.
 *
 * @package namespace App\Models;
 */
class Orders extends Model implements Transformable
{
    use TransformableTrait, HasApiTokens, HasFactory, Notifiable;
    const ID_CUSTOMER = 'id_customer';
    const TYPE = 'type';
    const TOTAL_PRICE = 'total_price';
    const STATUS = 'status';
    const NOTE = 'note';
    const PAYBANK = 1;
    const COD = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::ID_CUSTOMER,
        self::TYPE,
        self::TOTAL_PRICE,
        self::STATUS,
        self::NOTE,
    ];
    public static $payment = [
        self::PAYBANK => 'Thanh toán qua tài khoản ngân hàng',
        self::COD   => 'Thanh toán khi nhận hàng',
    ];
}
