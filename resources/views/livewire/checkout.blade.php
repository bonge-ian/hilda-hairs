<section class="uk-section uk-section-large uk-section-secondary uk-padding-remove-bottom uk-preserve-color"
    uk-height-viewport="expand:true; offset-top: true">
    <div class="uk-container">
        @if (!empty($cartItems))
            <div class="uk-width-1-1">
                <div class="uk-margin">
                    <x-alert type="danger" message="At the moment, we only ship for customers located in Kenya." />
                </div>
                <h1 class="uk-margin">Checkout</h1>
                @guest
                    <div class="uk-tile uk-padding-small uk-tile-muted uk-panel uk-margin">
                        <p class="uk-display-inline">
                            <span>Returning Customer?</span>
                            <a href="{{ route('login') }}" class="uk-link-heading">Click here to login</a>
                        </p>

                    </div>

                @endguest
                <div class="uk-tile uk-padding-small uk-tile-muted uk-panel uk-margin">
                    <p class="uk-display-inline">
                        <span>Have a coupon?</span>
                        <a href="#" class="uk-link-heading" uk-toggle="target: #coupon-code-form;animation: uk-animation-slide-top-small, uk-animation-slide-top-small;queued: true">Click here to enter your code</a>
                    </p>
                </div>

                <aside id="coupon-code-form" class="uk-tile uk-padding-small uk-tile-muted uk-panel uk-margin" hidden>
                    <livewire:coupon />
                </aside>

            </div>

            <form wire:submit.prevent="processOrder" action="POST" class="uk-form-stacked uk-padding uk-padding-remove-horizontal">
                <main class="uk-grid uk-grid-medium uk-child-width-1-1 " uk-grid>
                    <div class="uk-panel uk-width-3-5@m">
                        <h2 class="uk-margin">Billing Details</h2>
                        <div class="uk-grid uk-grid-medium uk-child-width-1-1" uk-grid>
                            <div class="uk-width-1-2@m">
                                <label for="name">Firstname</label>
                                <div class="uk-form-controls">
                                    <input type="text"
                                        wire:model.lazy="firstname"
                                        name="firstname"
                                        id="firstname"
                                        placeholder="Hilda"
                                        class="uk-input @error('firstname') uk-form-danger @enderror"
                                    @if (auth()->check()) disabled @endif>
                                </div>
                                @error('firstname')
                                <div class="uk-margin-small">
                                    <x-alert :message="$message" close="false" type="danger" />
                                </div>
                                @enderror
                            </div>
                            <div class="uk-width-1-2@m">
                                <label for="name">Lastname</label>
                                <div class="uk-form-controls">
                                    <input type="text"
                                        wire:model.lazy="lastname"
                                        name="lastname"
                                        id="lastname"
                                        placeholder="Hilda"
                                        class="uk-input @error('lastname') uk-form-danger @enderror"
                                        @if (auth()->check()) disabled @endif>
                                </div>
                                @error('lastname')
                                <div class="uk-margin-small">
                                    <x-alert :message="$message" close="false" type="danger" />
                                </div>
                                @enderror
                            </div>
                            <div class="uk-width-1-2@m">
                                <label for="name">Phone</label>
                                <div class="uk-form-controls">
                                    <input type="tel" wire:model.lazy="phone" name="phone" id="phone"
                                        placeholder="+254712345678/0712345678"
                                        class="uk-input @error('phone') uk-form-danger @enderror"
                                        @if (auth()->check()) disabled @endif>
                                </div>
                                @error('phone')
                                <div class="uk-margin-small">
                                    <x-alert :message="$message" close="false" type="danger" />
                                </div>
                                @enderror
                            </div>

                            <div class="uk-width-1-2@m">
                                <label for="name">Email</label>
                                <div class="uk-form-controls">
                                    <input type="email" wire:model.lazy="email" name="email" id="email"
                                        placeholder="mariehilda@example.com"
                                        class="uk-input @error('email') uk-form-danger @enderror"
                                        @if (auth()->check()) disabled @endif>
                                </div>
                                @error('email')
                                <div class="uk-margin-small">
                                    <x-alert :message="$message" close="false" type="danger" />
                                </div>
                                @enderror
                            </div>

                            <div class="uk-width-1-1">
                                <label for="county">County</label>
                                <div class="uk-form-controls">
                                    <select wire:click.prefetch="fetchCounties" wire:model.lazy="county" name="county" id="county"
                                        class="uk-input @error('county') uk-form-danger @enderror">
                                        <option value="0"> Choose a county </option>
                                        @foreach ($counties as $county)
                                        <option value="{{ $county->code }}">{{ $county->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('county')
                                <div class="uk-margin-small">
                                    <x-alert :message="$message" close="false" type="danger" />
                                </div>
                                @enderror
                            </div>

                            <div class="uk-width-1-1">
                                <label for="address">Street Address</label>
                                <div class="uk-width-1-1">
                                    <div class="uk-form-controls">
                                        <input type="text" wire:model.lazy="address_1" name="address_1" id="address_1"
                                            placeholder="House number,street name"
                                            class="uk-input @error('address_1') uk-form-danger @enderror" required
                                            autocomplete="on">
                                    </div>
                                    @error('address_1')
                                    <div class="uk-margin-small">
                                        <x-alert :message="$message" close="false" type="danger" />
                                    </div>
                                    @enderror
                                </div>
                                <div class="uk-width-1-1 uk-margin">
                                    <div class="uk-form-controls">
                                        <input type="text" wire:model.lazy="address_2" name="address_2" id="address_2"
                                            placeholder="Apartment,suite,unit,etc"
                                            class="uk-input @error('address_2') uk-form-danger @enderror" autocomplete="on">
                                    </div>
                                    @error('address_2')
                                    <div class="uk-margin-small">
                                        <x-alert :message="$message" close="false" type="danger" />
                                    </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="uk-width-1-1">
                                <label for="postalcode">Postal Code (optional)</label>
                                <div class="uk-form-controls">
                                    <input type="text" wire:model.lazy="postalcode" name="postalcode" id="postalcode"
                                        placeholder="Postal Code (optional)"
                                        class="uk-input @error('postalcode') uk-form-danger @enderror" autocomplete="on">
                                </div>
                                @error('postalcode')
                                <div class="uk-margin-small">
                                    <x-alert :message="$message" close="false" type="danger" />
                                </div>
                                @enderror
                            </div>

                            <div class="uk-width-1-1">
                                <label for="orderNotes">Order Notes (optional)</label>
                                <div class="uk-form-controls">
                                    <textarea wire:model.lazy="orderNotes" name="orderNotes" id="orderNotes" rows="5"
                                        class="uk-textarea @error('orderNotes') uk-form-dange @enderror"
                                        placeholder="Notes about your order, e.g. special notes for delivery, who to deliver to the order."></textarea>
                                </div>
                                @error('orderNotes')
                                <div class="uk-margin-small">
                                    <x-alert :message="$message" close="false" type="danger" />
                                </div>
                                @enderror
                            </div>

                            <div class="uk-width-1-1">
                                <div class="uk-form-controls">
                                    <label>
                                        <input type="checkbox" wire:model.lazy="createAccount"
                                            class="uk-checkbox uk-margin-small-right @error('createAccount') uk-form-danger @enderror">
                                        Create account
                                    </label>
                                </div>
                                @error('createAccount')
                                <div class="uk-margin-small">
                                    <x-alert :message="$message" close="false" type="danger" />
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <aside class="uk-width-2-5@m uk-padding uk-padding-remove-vertical">
                        <h2 class="uk-margin">Your order</h2>
                        <table class="uk-table uk-table-divider uk-table-responsive uk-table-striped uk-table-justify">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $cartItem)
                                <tr>
                                    <td>
                                        {{ $cartItem['name'] }} - {{ $cartItem['options']['size'] }} {{ $cartItem['options']['color']}} x
                                        {{ $cartItem['qty'] }}
                                    </td>
                                    <td>
                                        {{ $cartItem['price']  *  $cartItem['qty'] }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        Subtotal
                                    </td>
                                    <td>
                                        {{ Cart::subTotal(2) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Total
                                    </td>
                                    <td>
                                        {{ Cart::total(2) }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <button type="submit" class="uk-width-1-1 uk-button uk-button-large uk-button-primary">
                            Place Order
                        </button>
                    </aside>
                </main>
            </form>
        @else
            <div class="uk-container uk-container-xsmall">
                <div class="uk-width-1-1 ">
                    <div class="uk-tile uk-tile-primary uk-margin-large uk-preserve-color uk-text-center">
                        <h3 class="uk-h2">Hey there!</h3>
                        <p class="uk-text-lead uk-margin-remove-top">You have no items in your cart</p>
                        <a class="uk-button uk-button-secondary" href="{{ route('product.index') }}">Shop Now?</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
