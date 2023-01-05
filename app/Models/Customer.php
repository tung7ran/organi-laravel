<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Customer.
 *
 * @package namespace App\Models;
 */
class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const NAME           = 'name';
    const PHONE          = 'phone';
    const EMAIL          = 'email';
    const ADDRESS        = 'address';
    const PROVINECE_ID   = 'province_id';
    const DISTRICT_ID    = 'district_id';
    const DELETED_AT     = 'deleted_at';
    const CREATED_AT     = 'created_at';
    const UPDATED_AT     = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME,
        self::PHONE,
        self::EMAIL,
        self::ADDRESS,
        self::PROVINECE_ID,
        self::DISTRICT_ID,
        self::DELETED_AT,
        self::CREATED_AT,
        self::UPDATED_AT,

    ];
 

}
