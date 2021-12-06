<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class RelatedProducts extends Component
{
    public $categoryId;

    public $productId;

    public function mount(int $productId, int $categoryId)
    {
        $this->productId = $productId;
        $this->categoryId = $categoryId;
    }

    public function getRelatedProductsProperty()
    {
        return Cache::remember(
            'related-products',
            now()->addDays(3),
            fn () => Product::where([
                    ['id', '<>', $this->productId],
                    ['category_id', '=', $this->categoryId]
                ])
                ->with(['category:id,name,slug', 'variations.stock'])
                ->inRandomOrder()
                ->limit(8)
                ->get()
        );;
    }

    public function render()
    {
        return view('livewire.related-products');
    }
}
