<div>
    <section class="uk-section uk-section-large uk-padding-remove-vertical" uk-height-viewport="offset-top: true">
        <div class="uk-grid uk-grid-collapse uk-child-width-1-1 uk-child-width-1-2@m" uk-grid>
            {{-- image slider --}}
            <aside>
                <div uk-slideshow="animation: pull;ratio: 760:900">
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                        <ul class="uk-slideshow-items">
                            <li>
                                <img data-src="{{asset( $product->cover_image_url) }}"
                                    alt="{{ $product->name }} Cover Image" uk-img uk-cover>
                            </li>
                            @foreach ($product->images as $image)
                            <li>
                                <img data-src="{{asset( $image) }} "
                                    alt="{{ $product->name . " " . $loop->iteration }} Image" uk-img uk-cover>
                            </li>
                            @endforeach
                        </ul>

                        <div class="uk-slidenav-container uk-hidden@m">
                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                                uk-slidenav-previous uk-slideshow-item="previous">
                            </a>
                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#"
                                uk-slidenav-next uk-slideshow-item="next">
                            </a>
                        </div>
                        <aside class="uk-position-small uk-position-bottom-left uk-visible@m">
                            <ul class="uk-thumbnav uk-thumbnav-vertical">
                                <li uk-slideshow-item="0" class="uk-padding-remove-top">
                                    <a href="#" class="uk-cover-container">
                                        <canvas width="50" height="51"></canvas>
                                        <img data-src="{{asset( $product->cover_image_url)  }}"
                                            alt="{{ $product->name }} Thumbnail" width="50" height="51" uk-cover uk-img>
                                    </a>
                                </li>
                                @foreach ($product->images as $thumbs)
                                <li uk-slideshow-item="{{ $loop->iteration }}" class="uk-padding-remove-top">
                                    <a href="#" class="uk-cover-container">
                                        <canvas width="50" height="51"></canvas>
                                        <img data-src="{{asset( $thumbs) }}"
                                            alt="{{ $product->name . " " . $loop->iteration }} Thumbnail" width="50"
                                            height="51" uk-cover uk-img>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
            </aside>
            {{-- product info --}}
            <div class="uk-grid-item-match product-info">
                <div class="uk-tile-default">
                    <div
                        class="uk-tile uk-tile-large uk-flex uk-flex-middle uk-padding-medium-top uk-padding-remove-bottom">
                        <div class="uk-width-1-1 uk-panel">
                            <div class="uk-width-xlarge uk-margin-auto@m uk-text-left">
                                <x-breadcrumbs />
                            </div>
                        </div>
                    </div>
                    <div class="uk-tile uk-tile-large uk-flex uk-flex-middle uk-padding-medium-top">
                        <div class="uk-panel uk-width-1-1">
                            <div
                                class="uk-h6 uk-text-muted uk-margin-remove-vertical uk-width-xlarge uk-margin-auto@m uk-text-left">
                                <a href="{{ route('category.show', $product->category->slug) }}"
                                    class="uk-link-heading">
                                    {{ $product->category->name }}
                                </a>
                            </div>
                            <h1
                                class="uk-h2 uk-margin uk-margin-remove-bottom uk-width-xlarge uk-margin-auto@m uk-text-left uk-text-uppercase uk-text-bold">
                                {{ $product->name }}
                            </h1>

                            <div class="uk-panel uk-margin uk-width-xlarge uk-margin-auto@m">
                                <p class="uk-label uk-label-success">
                                    {{ $product->type->name }}
                                </p>
                            </div>
                            {{-- ratings --}}

                            <div class="uk-panel uk-margin uk-width-xlarge uk-margin-auto@m">
                                <p class="price uk-text-capitalize uk-text-primary uk-text-bold">
                                    {{ $product->formatted_price }}
                                </p>
                            </div>

                            <div class="uk-panel uk-margin-medium uk-width-xlarge uk-margin-auto@m">
                                <p>{{ $product->caption }}</p>
                            </div>

                            @if ($product->variations_count > 0)
                            <livewire:variations :variations="$this->variations" :productName="$product->name"
                                :image="$product->cover_image_url" />

                            @else
                                <div class="uk-panel uk-margin-medium uk-width-xlarge uk-margin-auto@m">
                                    <x-alert type="danger" message="This product is currently out of stock."/>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="uk-section uk-section-large uk-preserve-color uk-section-secondary"
        uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-slide-bottom-small; delay: 200;">
        <div class="uk-container uk-container-xsmall">
            <article class="uk-grid uk-child-width-1-1 uk-grid-margin uk-grid-stack" uk-grid>
                <div class="uk-width-1-1@m">
                    <h2 class="uk-h1 uk-text-bold uk-text-primary   uk-text-center@m" uk-scrollspy-class>Product Details</h2>
                    <hr class="uk-divider-small uk-text-center@m" uk-scrollspy-class>
                    <div class="uk-column-1-2@m uk-margin" uk-scrollspy-class>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </article>
        </div>
    </section>


    <livewire:related-products :productId="$product->id" :categoryId="$product->category->id" />
</div>
