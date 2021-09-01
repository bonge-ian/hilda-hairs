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

        $this->products = (match ($value) {
            'latest' => Product::latest(),
            'popular' => Product::inRandomOrder(),
            'price' => Product::orderBy('price', 'asc'),
            'price-desc' => Product::orderBy('price', 'desc'),
            default => Product::ordered()
        })->paginate(32);

    }

    public function paginationView()
    {
        return 'vendor.livewire.uikit';
    }

    public function render()
    {
        return view('livewire.product-listings', [
            'products' => $this->products ?? Product::paginate(32)
        ]);
    }
}
