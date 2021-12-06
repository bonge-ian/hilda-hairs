<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductView extends Component
{
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function getVariationsProperty()
    {
        return $this->product->variations->loadMissing(['size', 'color', 'stock']);
    }

    public function render()
    {
        return view('livewire.product-view')
            ->layout('layouts.app', [
                'title' => $this->product->name
            ]);
    }
}
