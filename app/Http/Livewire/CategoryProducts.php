<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Livewire\WithPagination;

class CategoryProducts extends Component
{
    use WithPagination;

    public $categoryId;

    public $readyToLoadProducts;

    public function getCategoryProperty()
    {
        return Category::find($this->categoryId);
    }

    public function loadProducts()
    {
        $this->readyToLoadProducts = true;
    }

    public function paginationView()
    {
        return 'vendor.livewire.uikit';
    }

    public function updatedPaginators()
    {
        $this->dispatchBrowserEvent('pageUpdated');
    }

    public function render()
    {
        $products = $this->readyToLoadProducts
            ? $this->fetchProducts()->paginate(40)
            : [];

        return view('livewire.category-products', compact('products'));
    }

    protected function fetchProducts()
    {
        $this->category->loadMissing('products', 'childrenProducts');

        $categoryProducts = $this->category->products->loadMissing('variations.stock');

        $childrenProducts = $this->category->childrenProducts->flatMap(
            fn ($child) => $child->products->flatten()
        );

        return Cache::remember(
            'category-products' . $this->categoryId,
            now()->addDays(2),
            fn () => $categoryProducts->merge($childrenProducts)
        );
    }
}
