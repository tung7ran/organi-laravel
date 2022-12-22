<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const FULL_NAME     = 'full_name';
    const USER_NAME     = 'user_name';
    const PHONE         = 'phone';
    const IMAGE         = 'image';
    const GOOGLE_ID     = 'google_id';
    const FACEBOOK_ID   = 'facebook_id';
    const STATUS        = 'status';
    const LEVEL         = 'level';
    const EMAIL         = 'email';
    const PASSWORD      = 'password';
    const GENDER        = 'gender';
    const MALE              = 1;
    const FEMALE            = 2;
    const CREATE_BY     = 'create_by';
    const UPDATED_BY    = 'updated_by';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::FULL_NAME,
        self::USER_NAME,
        self::PHONE,
        self::IMAGE,
        self::GOOGLE_ID,
        self::FACEBOOK_ID,
        self::STATUS,
        self::LEVEL,
        self::EMAIL,
        self::PASSWORD,
        self::GENDER,
        self::CREATE_BY,
        self::UPDATED_BY
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $listGender = [
        self::MALE   => 'Nam',
        self::FEMALE => 'Nữ',
    ];
}
