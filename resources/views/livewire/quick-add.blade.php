<button wire:click="addToCart" type="button"
    wire:key="$variation->id . ' ' . $productName "
    class="uk-width-1-1 uk-button uk-button-default uk-border-rounded uk-flex uk-flex-between uk-flex-middle">
    <span>Add to cart</span>
    <span class="uk-icon uk-text-right" uk-icon="icon: bag"></span>
</button>
