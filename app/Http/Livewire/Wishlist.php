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

    // protected $listeners = ['$refresh'];

    public function mount($ratio)
    {
        // $this->product = $product;
        $this->ratio = $ratio;
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
        if ($this->product->likedBy(Auth::user())) {
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
        $like = $this->product->likes()->make();
        $like->user()->associate(Auth::user());
        $like->save();
    }

    protected function deleteLike()
    {
        $like = Like::where([
            'user_id' => Auth::id(),
            'product_id' => $this->product->id
        ]);

        $like->delete();
    }
}
