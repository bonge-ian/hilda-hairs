<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductListings extends Component
{
    use WithPagination;

    public $sort;

    protected $products;

    protected $queryString = [
        'sort' => ['except' => 'Default Sorting']
    ];

    public function updatingSort()
    {
        $this->resetPage();
    }

    public function updatedSort($value)
    {
        $this->products = Product::with(['variations.stock']);

        $this->products = (match ($value) {
            'latest' => $this->products->latest(),
            'popular' => $this->products->inRandomOrder(),
            'price' => $this->products->orderBy('price', 'asc'),
            'price-desc' => $this->products->orderBy('price', 'desc'),
            default => $this->products->ordered()
        })->paginate(32);
    }

    public function updatedPaginators($page, $pageName)
    {
        $this->emit('pageUpdated');
    }

    public function paginationView()
    {
        return 'vendor.livewire.uikit';
    }

    public function render()
    {
        return view('livewire.product-listings', [
            'products' => $this->products ?? Product::with(['variations.stock'])->paginate(32)
        ]);
    }
}
