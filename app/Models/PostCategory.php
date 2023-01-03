<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PostCategory extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const NAME       = 'name';
    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::NAME,
        self::CREATED_BY,
        self::UPDATED_BY,
    ];
}
