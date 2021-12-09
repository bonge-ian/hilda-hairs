<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Cart\CartActions;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Exceptions\InvalidRowIDException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
            Session::flash('error', "The cart item is not found on the cart!");
            Log::alert("Error occured {$ex->getMessage()} on line {$ex->getLine()} of code {$ex->getCode()} produced by file {$ex->getFile()}. Stack Trace {$ex->getTraceAsString()}");

            return;
        }

        $this->resetErrorBag();
    }

    public function remove()
    {
        CartActions::delete($this->cartItem['rowId']);
        
        $this->emitTo('bag', 'cart-item-removed');
        $this->emit('cart-item-removed', Cart::content());
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
