<div>
    <section class="uk-section uk-section-large uk-section-default" uk-height-viewport="expand:true">
        <div class="uk-container uk-container-xlarge">
            <div class="uk-grid-margin uk-container">
                <div class="uk-child-width-1-1 uk-grid uk-grid-stack" uk-grid>
                    <div>
                        <h1 class="uk-margin-small">Your Cart</h1>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="uk-panel uk-margin-medium">
                            <div class="uk-overflow-auto uk-position-relative">
                                <table class="uk-table uk-table-middle uk-table-divider uk-table-responsive">
                                    <thead>
                                        <tr>
                                            <th class="uk-table-shrink"></th>
                                            <th class="uk-table-shrink"></th>
                                            <th class="uk-table-expand">Product</th>
                                            <th class="uk-table-shrink uk-text-nowrap">Price</th>
                                            <th class="uk-table-shrink">Quantity</th>
                                            <th class="uk-table-shrink uk-text-nowrap">SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cartItems as $cartItem)
                                        <livewire:cart-summary-item :wire:key="$cartItem['rowId']"
                                            :cartItem="$cartItem" />
                                        @empty
                                        <tr>
                                            <td colspan="6">
                                                <div class="uk-alert-primary" uk-alert>
                                                    <p>There are no items in your cart
                                                        <a class="uk-link" href="{{ route('product.index') }}">Shop
                                                            Now?</a>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforelse
                                        <tr>
                                            <td colspan="6">
                                                <div class="uk-grid uk-flex-middle" uk-grid>
                                                    <div class="uk-width-2-3@m">
                                                        <livewire:coupon />
                                                    </div>
                                                    <div class="uk-width-1-3@m uk-text-right@m">
                                                        <div class="uk-panel">
                                                            <button wire:click="updateCart"
                                                                class="uk-button uk-button-default uk-border-rounded" {{
                                                                ($this->isCartEmpty) ? 'disabled' : ''}}>
                                                                Update Cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div class="uk-position-cover uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle spinner-container"
                                    hidden>
                                    <div class="uk-icon uk-spinner" uk-spinner="ratio: 2"></div>
                                </div>
                            </div>
                        </div>

                        @if (!$this->isCartEmpty)
                            <div class="uk-panel uk-margin-medium">
                                <div class="uk-grid uk-child-width-1-2@m uk-child-width-1-1 uk-flex-middle" uk-grid>
                                    <div class="uk-flex-first uk-visible@m"></div>
                                    <div class="uk-flex-last@m uk-flex-first">
                                        <div class="uk-panel uk-position-relative">
                                            <h2>Cart Totals</h2>
                                            <table class="uk-table uk-table-middle uk-table-divider uk-table-responsive">
                                                <tbody>
                                                    <tr>
                                                        <td class="uk-table-expand uk-text-lead uk-text-bold">
                                                            Subtotal
                                                        </td>
                                                        <td class="uk-width-small uk-text-right">
                                                            <span class="uk-text-muted">Kes</span>
                                                            <span>{{ $subTotal }}</span>
                                                        </td>
                                                    </tr>
                                                    @if (Str::of($discount)->trim()->isNotEmpty() && $discount != "0.00")
                                                    <tr>
                                                        <td class="uk-table-expand uk-text-lead uk-text-bold">
                                                            <p class="uk-margin-small">Discount Applied</p>
                                                            <div class="uk-flex uk-flex-middle uk-text-middle uk-text-small uk-text-muted">
                                                                <span class="uk-margin-small-right uk-text-primary">
                                                                    {{ $couponCode }}
                                                                </span>
                                                                <a wire:click="$emitTo('coupon', 'destroy')" href="#" class="uk-link-muted">Remove
                                                                    Coupon</a>
                                                            </div>
                                                        </td>
                                                        <td class="uk-width-small uk-text-right">
                                                            <span class="uk-text-muted">Kes</span>
                                                            <span>{{ $discount }}</span>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <td class="uk-table-expand uk-text-lead uk-text-bold">
                                                            Total
                                                        </td>
                                                        <td class="uk-width-small uk-text-right">
                                                            <span class="uk-text-muted">Kes</span>
                                                            <span>{{ $total }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="2" class="uk-table-expand">
                                                            <a href="#" class="uk-button uk-button-primary uk-width-expand uk-button-large">
                                                                Proceed to checkout
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <div class="uk-position-cover uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle spinner-container"
                                                hidden>
                                                <div class="uk-icon uk-spinner" uk-spinner="ratio: 2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@once
    @push('scripts')
        <script>
            window.addEventListener('updating-cart-items', event => {

                document.querySelectorAll('.spinner-container').forEach((el) => {
                    var loading = setInterval(() => {
                        el.removeAttribute('hidden');
                        el.querySelector('.uk-spinner').classList.add('uk-display-block');

                        setTimeout(() => {
                            clearInterval(loading);
                            el.querySelector('.uk-spinner').classList.remove('uk-display-block');
                            el.setAttribute('hidden');
                        },1500);
                    },1);
                })
            });
        </script>
    @endpush
@endonce
