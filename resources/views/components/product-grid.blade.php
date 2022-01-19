<article class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-column-small uk-grid-match uk-grid"
    uk-grid>
    @forelse ($products as $product)
        <div>
            <x-product-card :product="$product" />
        </div>
    @empty
        @foreach (range(1,4) as $item)
            <div>
                <x-skeleton-product-card />
            </div>
        @endforeach
    @endforelse
</article>

 
    @if (!empty($products))
        <div class="uk-margin-large">
            {{ $products->links() }}
        </div>
    @endif
