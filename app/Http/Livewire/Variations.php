<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Variations extends Component
{
    public $variations;

    public $colors;

    public $sizes;

    public $color;

    public $size;

    public function mount($variations)
    {
        $this->variations = $variations;

        $this->colors = $this->groupedVariations()->keys();

        $this->sizes = collect();
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
        if ($value == false) {
            $this->dispatchBrowserEvent('reset-price');
        } else {
            if ($this->groupedVariations()->get($this->color)->get($value)->first()->inStock()) {
                $price = $this->groupedVariations()->get($this->color)->get($value)->pluck('price')->first()->formatted();
            } else {
                $price = "Out of stock";
            }

            $this->dispatchBrowserEvent('variation-picked', ['price' => $price]);
        }
    }

    private function groupedVariations()
    {
        return $this->variations->groupBy([
            'color.name',
            'size.name'
        ])->map(fn ($sizes) => $sizes->sortKeys());
    }

    public function render()
    {
        return view('livewire.variations');
    }
}
