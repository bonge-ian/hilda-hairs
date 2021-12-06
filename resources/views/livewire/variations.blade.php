<div class="uk-panel uk-margin-medium uk-width-xlarge uk-margin-auto@m">
    {{-- form --}}
    <form wire:submit.prevent="submit" class="uk-form-stacked uk-grid-medium uk-grid" uk-grid>
        <div class="uk-width-1-2@m">
            <label for="color" class="uk-form-label">Color</label>
            <div class="uk-form-controls uk-width-1-1">
                <select wire:model="color"
                    name="color" id="color" class="uk-select">
                    <option value="0">Choose a color</option>
                    @foreach ($colors as $color)
                    <option wire:key="{{ $color }}" value="{{ $color }}">{{ $color }}</option>
                    @endforeach
                </select>
            </div>

            @error('color')
                <div class="uk-width-1-1 uk-alert uk-alert-danger" uk-alert>
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>
        <div class="uk-width-1-2@m">
            <label for="size" class="uk-form-label">Size</label>
            <div class="uk-form-controls">
                <select wire:loading.attr="disabled" wire:target="color" wire:model="size" name="size" id="size"
                    class="uk-select">
                    <option value="0">--- Pick a color first ---</option>
                    @foreach ($sizes as $size)
                    <option wire:key="{{ $size }}" value="{{ $size }}">{{ $size }}</option>
                    @endforeach
                </select>
            </div>
            @error('size')
            <div class="uk-width-1-1 uk-alert uk-alert-danger" uk-alert>
                <p>{{ $message }}</p>
            </div>
            @enderror
        </div>
        <div class="uk-width-1-2@m">
            <label class="uk-form-label" for="quantity">Quantity</label>
            <div class="uk-form-controls">
                <input type="number" wire:model="quantity" name="quantity" id="quantity"
                    class="uk-input" value="1" step="1" min="1" max="{{ $this->stock }}"
                    {{ ($this->stock <= 0) ? 'disabled' : ''}}>

            </div>
            @error('quantity')
            <div class="uk-width-1-1 uk-alert uk-alert-danger" uk-alert>
                <p>{{ $message }}</p>
            </div>
            @enderror
        </div>

        <div class="uk-width-1-1 uk-margin-small " >
            <button type="button" wire:click="clear" class="uk-button uk-button-link {{ !$this->hasVariation ? 'uk-hidden' : '' }}">
                <span class="uk-icon" uk-icon="icon: close"></span>
                <span>Clear </span>
            </button>
        </div>


        <div class="uk-width-1-2@m">
            <button type="submit"
                class="uk-button uk-button-primary uk-width-1-1 uk-flex uk-flex-between uk-flex-middle">
                <span>Add to Basket</span>
                <span class="uk-icon" uk-icon="icon: bag"></span>
            </button>
        </div>
        @auth
            <div class="uk-width-auto">
                <livewire:wishlist :product="$product" :ratio="1.6" :wire:key="$product->id" />
            </div>
        @endauth

    </form>
</div>

@once
    @push('scripts')
        <script>
            let priceTag = document.querySelector('.price');
            let originalPrice = priceTag.innerText;

            window.addEventListener('variation-picked', event => {
                priceTag.innerText = event.detail.price;
                if (event.detail.price == "Out of stock") {
                    priceTag.classList.add('uk-text-danger');
                } else {
                    priceTag.classList.remove('uk-text-danger');
                }
            });

            window.addEventListener('reset-price', event => {
                resetPrice();
            });

            window.addEventListener('reset-variation', event => {
                resetPrice();
            });

            function resetPrice() {
                if (priceTag.innerText !== originalPrice) {
                    priceTag.innerText = originalPrice;
                    priceTag.classList.remove('uk-text-danger');
                }
            }

        </script>
    @endpush
@endonce
