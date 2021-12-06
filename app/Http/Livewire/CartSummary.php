<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Catch_;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartSummary extends Component
{
    public array $cartItems = [];

    public string $total = '';

    public string $subTotal = '';

    public $discount = '';

    public $couponCode = '';

    protected $listeners = [
        'cart-item-updated' => 'cartItemUpdated',
        'cart-item-removed' => 'cartItemRemoved',
        'error-updating-cart-item' => 'flushErrors',
        'discount-applied' => 'discountApplied',
        'discount-removed' => 'discountRemoved'
    ];

    public function mount()
    {
        $this->cartItems = Cart::content()->toArray();
        $this->total = Cart::total(2);
        $this->subTotal = Cart::priceTotal(2);

        $this->discount = Str::of(Cart::discount(2))->trim()->isNotEmpty ? Cart::discount(2) : '';
    }

    public function getIsCartEmptyProperty(): bool
    {
        return empty($this->cartItems);
    }

    public function updateCart()
    {
        $this->dispatchBrowserEvent('updating-cart-items');
        $this->emitTo('cart-summary-item', 'update-cart-item-quantity');
    }

    public function cartItemUpdated($content)
    {
        $this->resetContent($content);
        return;
    }

    public function cartItemRemoved($content)
    {
        $this->resetContent($content);
        $this->emitTo('bag', 'cart-item-removed');
        return;
    }

    public function coupon(string $coupon)
    {
        // TODO: implement coupon system
    }

    public function discountApplied($couponCode, $content)
    {
        $this->resetContent($content);

        $this->couponCode = $couponCode;

        return;
    }

    public function discountRemoved($content)
    {
        $this->resetContent($content);

        return;
    }

    public function flushErrors($data)
    {
        dd($data);
    }

    public function render()
    {
        return view('livewire.cart-summary')
            ->layout('layouts.app', ['title' => 'Cart Summary']);
    }

    protected function resetContent($content)
    {
        //    $content =  is_array($content) ? collect($content) : $content;

        $this->reset(['cartItems', 'total', 'subTotal', 'discount']);

        $this->cartItems = $content;
        $this->total = Cart::total(2);
        $this->subTotal = Cart::priceTotal(2);
        if (!empty($content)) {
            $this->discount = Cart::discount(2);
        }
    }
}
