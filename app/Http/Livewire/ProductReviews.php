<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;

class ProductReviews extends Component
{
    use WithPagination;

    public $productId;

    public $productName;

    public function mount(int $productId, string $productName)
    {
        $this->productName = $productName;

        $this->productId = $productId;
    }

    public function getReviewsProperty()
    {
        return Review::where('product_id', $this->productId)
            ->with('user:id,name')
            ->latest()
            ->paginate(6);
    }

    public function paginationView()
    {
        return 'vendor.livewire.uikit';
    }

    public function render()
    {
        return view('livewire.product-reviews');
    }
}
