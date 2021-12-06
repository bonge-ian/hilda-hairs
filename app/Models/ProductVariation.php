<?php

namespace App\Models;

use App\Cart\Money;
use App\Models\Traits\HasPrice;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariation extends Model implements Buyable
{
    use HasFactory, HasPrice;

    protected $fillable = [
        'name',
        'price',
        'order'
    ];

    public function getPriceAttribute($value): Money
    {
        if (is_null($value)) {
            return $this->loadMissing([
                'product' => fn ($query) => $query->without(['category'])->withCount([])
            ])->product->price;
        }

        return new Money($value);
    }

    public function priceVaries()
    {
        return $this->price->amount() !== $this->product->price->amount();
    }

    public function inStock()
    {
        // return (bool) $this->stock->first()->pivot->in_stock;
        return $this->stockCount() > 0;
    }

    public function stockCount()
    {
        return $this->stock->sum('pivot.stock');
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function stock()
    {
        return $this->belongsToMany(
            ProductVariation::class,
            'product_variation_stock_view'
        )->withPivot(['stock', 'in_stock']);
    }

    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }

    public function getBuyableDescription($options = null)
    {
        return $this->product->name;
    }

    public function getBuyablePrice($options = null)
    {
        return $this->price->amount() / 100;
    }

    public function getBuyableWeight($options = null)
    {
        return 0.0;
    }
}
