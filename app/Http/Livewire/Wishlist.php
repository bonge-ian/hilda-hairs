<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Component
{
    public Product $product;

    public $ratio = 1;

    public function mount(Product $product, mixed $ratio)
    {
        $this->product = $product;
        $this->ratio = $ratio;
    }

    public function getIsLikedProperty()
    {
        return $this->product->likedBy(Auth::user());
    }

    public function like()
    {
        $this->likeAction();
    }

    public function render()
    {
        return view('livewire.wishlist');
    }

    protected function likeAction()
    {
        if ($this->isLiked) {

            // user already liked so we dislike
            $this->deleteLike();

            $this->dispatchBrowserEvent(
                'unlike-product',
                [
                    'message' => "{$this->product->name} has been removed from your wishlist"
                ]
            );
        } else {
            $this->storeLike();

            $this->dispatchBrowserEvent(
                'like-product',
                [
                    'message' => "{$this->product->name} has been added to your wishlist"
                ]
            );
        }
    }

    protected function storeLike()
    {
        $this->product->likes()->create([
            'user_id' => Auth::id()
        ]);
    }

    protected function deleteLike()
    {
        $this->product->likes()->create([
            'user_id' => Auth::id()
        ]);
        Like::where([
            'user_id' => Auth::id(),
            'product_id' => $this->product->id
        ])->delete();
    }
}
