<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductListings extends Component
{
    use WithPagination;

    public $sort = '';

    public $page = 1;

    public $readyToLoadProducts = false;

    protected $products = [];

    protected $queryString = [
        'sort' => ['except' => ''],
        'page' => ['except' => 1]
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
        $this->products = Product::with('variations.stock');

        $this->products = (match ($value) {
            'latest' => $this->products->latest(),
            'popular' => $this->products->inRandomOrder(),
            'price-asc' => $this->products->orderBy('price', 'asc'),
            'price-desc' => $this->products->orderBy('price', 'desc'),
            default => $this->products->ordered()
        })->paginate(32);
    }

    public function updatingPaginators()
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
            ?  Product::with('variations.stock')->paginate(32)
            : [];

        return view('livewire.product-listings', [
            'products' => (!empty($this->products)) ? $this->products : $initProducts
        ]);
    }
}
