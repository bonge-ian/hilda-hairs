<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Propaganistas\LaravelPhone\Casts\E164PhoneNumberCast;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone'
    ];

    protected $casts = [
        'phone' => E164PhoneNumberCast::class . ':KE',
    ];

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable', 'addresses');
    }
}
