<?php

namespace App\Http\Livewire;

use App\Models\Coupon as CouponModel;
use Livewire\Component;
use App\Cart\CartActions;
use Illuminate\Validation\Rule;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class Coupon extends Component
{
    public string $code = '';

    protected $listeners = [
        'destroy',
        'cart-item-removed' => '$refresh'
    ];

    public function getIsApplicableProperty()
    {
        return Cart::content()->isNotEmpty();
    }

    public function getCodeAppliedProperty()
    {
        return $this->code;
    }

    public function apply()
    {
        if (!$this->getIsApplicableProperty()) {
            return;
        }

        $this->validate();

        // apply discount
        $coupon = CouponModel::where('code', strtolower($this->code))->first();
        $coupon->increment('applied_count');

        $this->codeApplied = $coupon->code;

        CartActions::discount($coupon->percentage_discount);

        $couponCodeWithDiscount = strtoupper($this->codeApplied) . "({$coupon->percentage_discount} % off)";

        Session::put('coupon-code', $couponCodeWithDiscount);

        Session::flash('success', "{$this->code} has been applied");

        $this->emitUp('discount-applied', $couponCodeWithDiscount, Cart::content());

        $this->isApplicable = false;

        $this->reset('code');

        $this->resetErrorBag();
    }

    public function destroy()
    {
        CouponModel::where('code', $this->codeApplied)->first()->decrement('applied_count');

        CartActions::removeDiscount();

        if (Session::exists('coupon-code')) {
            Session::forget('coupon-code');
        }

        Session::flash('success', "{$this->code} has been removed.");

        $this->emitUp('discount-removed', Cart::content());

        $this->isApplicable = true;
    }

    public function render()
    {
        return view('livewire.coupon');
    }

    protected function rules()
    {
        return [
            'code' => Rule::when(
                Cart::content()->isNotEmpty(),
                [
                    'required',
                    'string',
                    Rule::exists('coupons')->where(function ($query) {
                        return $query->where('expiry', '>', now());
                    })
                ]
            )
        ];
    }
}
