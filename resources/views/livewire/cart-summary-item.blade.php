<tr>
    <td>
        <button wire:click="remove" type="button" class="uk-icon uk-preserve-width" uk-icon="icon: close"
            uk-tooltip="title: Remove from cart"></button>
    </td>
    <td>
        <img class="uk-preserve-width uk-border-rounded"
            src="{{ asset('img/' . $cartItem['options']['cover_image_url']) }}" width="40" height="40"
            alt="{{ $cartItem['name'] }} thumbnail" loading="lazy">
    </td>
    <td class="uk-table-link">
        <a href="{{ route('product.show', $cartItem['options']['slug'] ) }}"
            class="uk-link-heading uk-padding-remove-bottom">
            {{ $cartItem['name'] }}
        </a>
        <div class="uk-margin-small-top uk-text-muted uk-padding-small uk-padding-remove-vertical">
            <p class="uk-margin-remove uk-margin-small-top">Color:
                {{ $cartItem['options']['color'] }}
            </p>
            <p class="uk-margin-remove">Size: {{ $cartItem['options']['size'] }}</p>
        </div>
    </td>
    <td>Ksh. {{ $cartItem['price'] }}</td>
    <td>
        @error('quantity')
            <div class="uk-alert uk-alert-danger">
                {{ $message }}
            </div>
        @enderror
        <input wire:model.defer="quantity" type="number" name="quantity" id="quantity"
            class="uk-input @error('quantity') {{ " uk-form-danger" }} @enderror" value="{{ $cartItem['qty'] }}" min="1"
            max="{{ $cartItem['options']['stock'] }}" required>
    </td>
    <td class=" ">Ksh. {{ $cartItem['price']  * $cartItem['qty'] }}</td>
</tr>

<div wire:loading.delay.longest wire:target="quantity"
    class="uk-position-cover uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">
    <div class="uk-icon uk-spinner" uk-spinner="ratio: 2"></div>
</div>
