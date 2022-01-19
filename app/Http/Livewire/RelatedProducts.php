<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class RelatedProducts extends Component
{
    public $readyToLoadRelatedProducts = false;

    public $categoryId;

    public $productId;

    public function loadRelatedProducts()
    {
        $this->readyToLoadRelatedProducts = true;
    }

    public function render()
    {
        $relatedProducts = $this->readyToLoadRelatedProducts ? $this->fetch() : [];

        return view('livewire.related-products', compact('relatedProducts'));
    }

    protected function fetch()
    {
        $products = Product::whereKeyNot($this->productId)
            ->whereRelation('category', 'id', '=', $this->categoryId)
            // ->where('category_id', '=', $this->categoryId)
            ->with(['category:id,name,slug', 'variations.stock'])
            ->inRandomOrder()
            ->limit(8)
            ->get();

        return Cache::remember(
            'related-products',
            now()->addDays(3),
            fn () => $products
        );
    }
}
