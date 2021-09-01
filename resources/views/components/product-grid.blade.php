<article class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-grid-column-small uk-grid-match uk-grid"
    uk-grid>
    @foreach ($products as $product)
    <div>
        <x-product-card :product="$product" />
    </div>
    @endforeach
</article>

<div class="uk-margin-large">
    {{ $products->links() }}
</div>
