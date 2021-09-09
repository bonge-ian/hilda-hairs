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

    protected $appends = ['in_stock'];

    public function getInStockAttribute()
    {
        return $this->inStock();
    }

    public function inStock()
    {
        return $this->stockCount() > 0;
    }

    public function stockCount()
    {
        return $this->variations->sum(
            fn ($variation) => $variation->stockCount()
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class)->orderBy('order', 'asc');
    }

    public function likes() : HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
