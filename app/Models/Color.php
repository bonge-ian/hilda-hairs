<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'order'];

    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }
}
