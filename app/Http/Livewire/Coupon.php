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
        $this->checkIfCanApplyCoupon();

        $this->validate();

        $couponCodeWithDiscount = $this->processCoupon($this->code);

        $this->emitUp('flash-message', strtoupper($this->codeApplied) . " coupon code has been applied");

        $this->emitUp('discount-applied', $couponCodeWithDiscount, Cart::content());

        $this->reset('code');

        $this->resetErrorBag();
    }


    public function destroy()
    {
        CouponModel::where('code', $this->codeApplied)->first()->decrement('applied_count');

        CartActions::removeDiscount();

        if (Session::exists('coupon-code') || Session::exists('coupon-code-with-discount')) {
            Session::forget('coupon-code');
            Session::forget('coupon-code-with-discount');
        }

        $this->emitUp('flash-message', strtoupper($this->codeApplied) . " coupon code has been removed.");

        $this->emitUp('discount-removed', Cart::content());

        $this->isApplicable = true;
    }

    public function render()
    {
        return view('livewire.coupon');
    }

    protected function processCoupon(string $code)
    {
        $coupon = CouponModel::where('code', strtolower($code))->first();
        $coupon->increment('applied_count');

        $this->codeApplied = $coupon->code;

        Session::put('coupon-code', strtoupper($this->codeApplied));

        CartActions::discount($coupon->percentage_discount);

        $couponCodeWithDiscount = strtoupper($this->codeApplied) . "({$coupon->percentage_discount} % off)";

        Session::put('coupon-code-with-discount', $couponCodeWithDiscount);

        $this->isApplicable = false;

        return $couponCodeWithDiscount;
    }

    protected function checkIfCanApplyCoupon()
    {
        if (!$this->getIsApplicableProperty()) {
            return;
        }

        if (
            Session::exists('coupon-code')
            &&
            strtoupper($this->codeApplied === Session::get('coupon-code'))
        ) {
            $this->addError('code', "The coupon has already been applied!.");
            $this->isApplicable = false;
            return;
        }
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
                        return $query->where('expiry', '>', now())
                            ->whereColumn('max_count', '>=', 'applied_count');
                    }),

                ]
            )
        ];
    }
}
