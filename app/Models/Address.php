<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'address_1',
        'address_2',
        'county_id',
        'postal_code',
        'addressable_id',
        'addressable_type',
    ];

    protected $table = 'addresses';

    protected $casts = [
        'default' => 'boolean'
    ];

    public static function boot()
    {
        parent::boot();

        // set the other addresses's default flag to false, if the current default flag is true
        static::creating(
            function ($address) {
                if ($address->default) {
                    $address->addressable->addresses()->update([
                        'default' => false
                    ]);
                }
            }
        );
    }

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }

    public function county(): HasOne
    {
        return $this->hasOne(County::class);
    }
}
