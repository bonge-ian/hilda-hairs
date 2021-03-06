<?php

namespace App\Models;

use App\Models\Traits\IsOrderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, IsOrderable;

    protected $fillable = [
        'name',
        'slug',
        'cover_image_url',
        'order'
    ];

    public function scopeParents(Builder $builder)
    {
        $builder->whereNull('parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class)->orderBy('order', 'asc');
    }

    public function childrenProducts()
    {
        return $this->children()->with('products')->orderBy('order', 'asc');
    }
}
