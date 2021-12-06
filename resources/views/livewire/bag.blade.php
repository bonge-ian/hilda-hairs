<a href="{{ route('cart') }}">
    <span class="uk-icon" uk-icon="bag"></span>
    @if (Cart::content()->isNotEmpty())
        <span class="uk-badge"> {{ Cart::content()->count() }} </span>
    @endif
</a>
