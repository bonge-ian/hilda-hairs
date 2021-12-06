<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'percentage_discount',
        // 'amount_discount',
        'max_count',
        'applied_count',
        'expiry'
    ];

    protected $casts = [
        'expiry' => 'datetime',
    ];
}
