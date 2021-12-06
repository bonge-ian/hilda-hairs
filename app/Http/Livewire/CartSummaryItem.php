<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Cart\CartActions;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Exceptions\InvalidRowIDException;

class CartSummaryItem extends Component
{
    public int $quantity = 1;

    public $cartItem;

    protected $listeners = [
        'update-cart-item-quantity' => 'update'
    ];

    public function mount(array $cartItem)
    {
        $this->cartItem = $cartItem;
        $this->quantity = $this->cartItem['qty'];
    }

    public function update()
    {
        $originalQuantity = Cart::get($this->cartItem['rowId'])->qty;

        if ($originalQuantity === $this->quantity) {
            return;
        }

        try {
            $this->validate();

            $this->cartItem = CartActions::update($this->cartItem['rowId'], $this->quantity)->toArray();

            $this->resetErrorBag();
            
            $this->emitUp('cart-item-updated', Cart::content());
        } catch (InvalidRowIDException $ex) {
            // TODO: implement error handling
        }
    }

    public function remove()
    {
        CartActions::delete($this->cartItem['rowId']);
        $this->emitUp('cart-item-removed', Cart::content());
    }

    public function render()
    {
        return view('livewire.cart-summary-item');
    }

    protected function rules(): array
    {
        return [
            'quantity' => "required|numeric|min:1|max:{$this->cartItem['options']['stock']}"
        ];
    }
}
