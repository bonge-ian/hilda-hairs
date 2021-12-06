<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Cart\CartActions;
use Gloudemans\Shoppingcart\Exceptions\CartAlreadyStoredException;

class QuickAdd extends Component
{
    public $variation;

    public $productName;

    public $productImageUrl;

    public function mount($variation, $productName, $productImageUrl)
    {
        $this->variation = $variation;
        $this->productName = $productName;
        $this->productImageUrl = $productImageUrl;
    }

    public function addToCart()
    {
        $this->variation->loadMissing(['size:id,name', 'color:id,name']);

        try {
            CartActions::add(
                $this->variation,
                $this->productName,
                1,
                $this->productImageUrl,
                $this->variation->color->name,
                $this->variation->size->name,
                $this->variation->stockCount()
            );
            $this->emit('item-added'); // will refresh the bag component

            $this->dispatchBrowserEvent('item-added-to-cart', [
                'message' => "{$this->productName} has been added to cart"
            ]);
        } catch (CartAlreadyStoredException) {
            $this->dispatchBrowserEvent('item-already-stored', [
                'message' => "{$this->productName} is already stored in your cart"
            ]);
        }
    }

    public function render()
    {
        return view('livewire.quick-add');
    }
}
