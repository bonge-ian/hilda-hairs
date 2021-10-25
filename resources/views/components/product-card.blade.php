<div class="uk-card uk-card-default">
    @auth
    <div class="uk-position-small uk-position-top-left uk-position-z-index">
        <livewire:wishlist :product="$product" :ratio="0.8" :wire:key="$product->id" />
    </div>
    @endauth
    <div class="uk-card-badge uk-label uk-position-top-right uk-position-small">{{ $product->type }}</div>
    <div class="uk-card-media-top uk-cover-container">
        <a href="{{ route('product.show', $product->slug) }}" class="uk-link-reset">
            <canvas width="433" height="650"></canvas>
            <img data-src="{{ asset('storage/' . $product->cover_image_url) }}" alt="{{ $product->name }} Cover Image"
                class="uk-cover " width="433" height="650" uk-cover uk-img>
        </a>
    </div>
    <div class="uk-card-body uk-padding-small">
        <div class="uk-grid uk-grid-small" uk-grid>
            <div class="uk-width-expand uk-text-left">
                <a href="{{ route('category.show', $product->category->slug) }}" class="uk-link-toggle">
                    <span class="uk-link-heading uk-text-left">{{ $product->category->name }}</span>
                </a>
            </div>
            <div class="uk-width-expand uk-text-right">
                @if ($product->in_stock)
                <p class="uk-text-success">In Stock</p>
                @endif
            </div>
        </div>
        <div class="uk-width-1-1 uk-panel uk-text-left uk-margin uk-margin-small-top">
            <h3 class="uk-card-title uk-text-truncate">
                <a href="{{ route('product.show', $product->slug) }}" class="uk-link-heading">
                    {{ $product->name }}</a>
            </h3>
        </div>
        <div class="uk-width-1-1 uk-panel uk-text-left uk-margin">
            <p class="uk-text-lead uk-text-bold uk-text-small uk-text-primary">
                <span class="uk-icon uk-margin-small-right" uk-icon="tag"></span>
                @if ($product->variations_count >= 2 )
                    <span class="uk-text-meta">Starting from: </span>
                    <span>{{ $product->formatted_price}}</span>
                @else
                    <span>{{ $product->formatted_price}}</span>
                @endif
            </p>
        </div>
        <div class="uk-width-1-1 uk-panel uk-margin">
            @if ($product->variations_count >= 2)
            <a href="{{ route('product.show', $product->slug) }}"
                class="uk-button uk-button-default uk-border-rounded uk-flex uk-flex-between uk-flex-middle">
                <span>Select Options</span>
                <span class="uk-icon uk-text-right" uk-icon="icon: product-options"></span>
            </a>
            @else
            <a href="#" class="uk-button uk-button-default uk-border-rounded uk-flex uk-flex-between uk-flex-middle">
                <span>Add to cart</span>
                <span class="uk-icon uk-text-right" uk-icon="icon: bag"></span>
            </a>
            @endif
        </div>
    </div>
</div>
