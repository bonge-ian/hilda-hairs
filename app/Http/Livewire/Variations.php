<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Cart\CartActions;
use Gloudemans\Shoppingcart\Exceptions\CartAlreadyStoredException;

class Variations extends Component
{
    public $variations;

    public $productName;

    public $image;

    public $colors;

    public $sizes;

    public $color;

    public $size;

    public $quantity = 1;

    public $variation;

    public function mount($variations, $productName, $image)
    {
        $this->variations = $variations;

        $this->productName = $productName;

        $this->image = $image;

        $this->colors = $this->groupedVariations()->keys();

        $this->sizes = collect();
    }

    public function getProductProperty()
    {
        return $this->variation->product;
    }

    public function updatedColor($value)
    {
        if ($value != false) {
            $this->sizes = $this->groupedVariations()->get($value)->keys();
            $this->reset('size');
        } else {
            $this->sizes = collect();
            $this->reset('size');

            $this->dispatchBrowserEvent('reset-price');
        }
    }

    public function updatedSize($value)
    {
        if ($value) {
            $this->variation = $this->groupedVariations()->get($this->color)->get($value)->first();

            if ($this->variation->inStock()) {
                $price = $this->variation->price->formatted();
            } else {
                $price = "Out of stock";
            }

            $this->dispatchBrowserEvent('variation-picked', ['price' => $price]);

        } else {
            $this->dispatchBrowserEvent('reset-price');
        }
    }

    public function getStockProperty()
    {
        return $this->variation?->stockCount() ?? 0;
    }

    public function getHasVariationProperty()
    {
        if (!is_null($this->variation)) {
            return true;
        }

        return false;
    }

    public function clear()
    {
        $this->reset([
            'size',
            'color',
            'quantity',
            'variation'
        ]);

        $this->dispatchBrowserEvent('reset-variation');
    }

    public function submit()
    {
        $this->validate();

        try {
            CartActions::add(
                $this->variation,
                $this->productName,
                $this->quantity,
                $this->image,
                $this->color,
                $this->size,
                $this->getStockProperty()
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
        return view('livewire.variations');
    }

    protected function rules()
    {
        return [
            'color' => 'required|exists:colors,name',
            'size' => 'required|exists:sizes,name',
            'quantity' => [
                'required',
                'numeric',
                'min:1',
                'max:' . $this->stock
            ]
        ];
    }

    private function groupedVariations()
    {
        return $this->variations->groupBy([
            'color.name',
            'size.name'
        ])->map(fn ($sizes) => $sizes->sortKeys());
    }
}
