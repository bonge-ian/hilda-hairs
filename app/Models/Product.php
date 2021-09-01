<?php

namespace App\Models;

use App\Models\Traits\{HasPrice, IsOrderable};
use App\Models\Casts\HairTypeCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, IsOrderable, HasPrice;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'caption',
        'type',
        'price',
        'order',
        'is_viewable',
        'cover_image_url',
        'images'
    ];

    protected $casts = [
        'is_viewable' => 'boolean',
        'images' => 'array',
        'type' => HairTypeCast::class
    ];

    protected $with = ['category', 'variations'];

    public function category(): BelongsTo

    {
        return $this->belongsTo(Category::class);
    }

    public function variations() : HasMany
    {
        return $this->hasMany(ProductVariation::class)->orderBy('order', 'asc');
    }
}
