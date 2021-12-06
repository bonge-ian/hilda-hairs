<?php

namespace App\Http\Livewire;

use App\Models\Coupon as CouponModel;
use Livewire\Component;
use App\Cart\CartActions;
use Illuminate\Validation\Rule;
use Gloudemans\Shoppingcart\Facades\Cart;

class Coupon extends Component
{
    public string $code = '';


    protected $listeners= [
        'destroy'
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
        $this->validate();

        // apply discount
        $coupon = CouponModel::where('code', strtolower($this->code))->first();
        $coupon->increment('applied_count');

        $this->codeApplied = $coupon->code;

        CartActions::discount($coupon->percentage_discount);

        $couponCodeWithDiscount = strtoupper($this->codeApplied) . "({$coupon->percentage_discount} % off)";

        $this->emitUp('discount-applied', $couponCodeWithDiscount, Cart::content());

        $this->reset('code');

        $this->isApplicable = false;
    }

    public function destroy()
    {
        CouponModel::where('code', $this->codeApplied)->first()->decrement('applied_count');

        CartActions::removeDiscount();
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
