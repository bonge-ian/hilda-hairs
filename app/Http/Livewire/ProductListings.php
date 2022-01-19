<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class ProductListings extends Component
{
    use WithPagination;

    public $sort = null;

    public $readyToLoadProducts = false;

    protected $products = null;

    protected $queryString = [
        'sort' => ['except' => 'Default Sorting']
    ];

    public function loadPosts()
    {
        $this->readyToLoadProducts = true;
    }

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
        $initProducts = $this->readyToLoadProducts
            ? Cache::remember(
                'initial-product-list',
                now()->addDay(),
                fn () => Product::with(['variations.stock'])->paginate(40)
            )
            : [];

        return view('livewire.product-listings', [
            'products' => $this->products ?? $initProducts
        ]);
    }
}
