<?php

namespace App\Models;

use App\Models\Traits\IsOrderable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Size extends Model
{
    use HasFactory, IsOrderable;

    protected $fillable = ['name', 'order'];

    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }
}
