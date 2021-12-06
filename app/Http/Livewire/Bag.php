<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Bag extends Component
{
    protected $listeners = [
        'item-added' => '$refresh',
        'cart-item-removed' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.bag');
    }
}
