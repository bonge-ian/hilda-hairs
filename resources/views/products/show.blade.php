<x-app-layout title="{{ $product->name }}">
    <section class="uk-section uk-section-large uk-padding-remove-vertical" uk-height-viewport="offset-top: true">
        <div class="uk-grid uk-grid-collapse uk-child-width-1-1 uk-child-width-1-2@m" uk-grid>
            {{-- image slider --}}
            <aside>
                <div uk-slideshow="animation: pull;ratio: 760:790">
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                        <ul class="uk-slideshow-items">
                            <li>
                                <img data-src="{{ asset('storage/' . $product->cover_image_url) }}"
                                    alt="{{ $product->name }} Cover Image" uk-img uk-cover>
                            </li>
                            @foreach ($product->images as $image)
                            <li>
                                <img data-src="{{ asset('storage/' . $image) }} "
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
                                        <img data-src="{{ asset('storage/' . $product->cover_image_url)  }}"
                                            alt="{{ $product->name }} Thumbnail" width="50" height="51" uk-cover uk-img>
                                    </a>
                                </li>
                                @foreach ($product->images as $thumbs)
                                <li uk-slideshow-item="{{ $loop->iteration }}" class="uk-padding-remove-top">
                                    <a href="#" class="uk-cover-container">
                                        <canvas width="50" height="51"></canvas>
                                        <img data-src="{{ asset('storage/' . $thumbs) }}"
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
                                    {{ $product->type }}
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

                            @if ($variations->count())
                            <livewire:variations :variations="$variations" />
                            @endif

                            <div class="uk-panel uk-margin-medium uk-width-xlarge uk-margin-auto@m">
                                <form action="" class="uk-form-stacked uk-width-medium">
                                    <div>
                                        <label class="uk-form-label" for="quantity">Quantity</label>
                                        <div class="uk-form-controls">
                                            <input type="number" id="form-stacked-text" class="uk-input" value="1"
                                                step="1" min="1" max="">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="uk-panel uk-margin-medium uk-width-xlarge uk-margin-auto@m">
                                <div class="uk-width-large">
                                    <div class="uk-grid uk-flex-middle uk-grid-small" uk-grid>
                                        <div class="uk-width-expand">
                                            <button
                                                class="uk-button uk-button-primary uk-width-1-1 uk-flex uk-flex-between uk-flex-middle">
                                                <span>Add to Basket</span>
                                                <span class="uk-icon" uk-icon="icon: bag"></span>
                                            </button>
                                        </div>
                                        @auth
                                        <div class="uk-width-auto">
                                            <livewire:wishlist :product="$product" :ratio="1.6"
                                                :wire:key="$product->id" />
                                        </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="uk-section uk-padding-remove-vertical uk-preserve-color">
        <div class="uk-grid uk-grid-collapse uk-child-width-1-2@m uk-child-width-1-1" uk-grid>
            <div class="uk-tile-secondary uk-preserve-color">
                <div class="uk-tile uk-flex uk-flex-middle uk-tile-xlarge ">
                    <div class="uk-width-1-1 uk-panel">
                        <div class="uk-panel uk-margin-medium  uk-margin-auto@m uk-width-xlarge">
                            <h2 class="uk-h1 uk-text-bold uk-text-primary">Product Details</h2>
                            <hr class="uk-divider-small">
                        </div>
                        <div class="uk-panel uk-margin-medium uk-width-xlarge uk-margin-auto@m">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-grid-item-match">
                <div class="uk-tile">
                    <h2 class="uk-h1 uk-text-bold">What People Say About {{ $product->name }}</h2>
                    <hr class="uk-dividier-small">
                    <div class="uk-panel uk-margin-medium uk-width-xlarge uk-margin-auto@m">

                        <div class="uk-grid uk-grid-margin uk-grid-row-small uk-child-width-1-1" uk-grid>
                            @foreach (range(1,4) as $range)
                            <div>
                                <article class="uk-comment">
                                    <header class="uk-comment-header">
                                        <div class="uk-grid-medium uk-flex-middle" uk-grid>
                                            <div class="uk-width-auto">
                                                <img class="uk-comment-avatar uk-border-circle"
                                                    data-src="https://i.pravatar.cc/80?img={{ rand(1,70) }}" width="80"
                                                    height="80" alt="" uk-img>
                                            </div>
                                            <div class="uk-width-expand">
                                                <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset"
                                                        href="#">Author</a>
                                                </h4>
                                                <div class="uk-comment-meta">
                                                    {{ rand(2,30)}} days ago
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="uk-comment-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Suscipit aperiam laborum molestiae quibusdam velit,
                                            asperiores culpa quisquam consequuntur dolorem saepe id
                                            quasi exercitationem, voluptatem et delectus rem,
                                            doloribus non animi?</p>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="uk-section uk-section-muted">
        <div class="uk-container uk-container">

            <div class="uk-slider-container-offset" uk-slider>
                <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                    <div class="uk-slider-container">
                        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-4@l uk-grid uk-grid-column-small"
                            uk-height-match="target: > li > div > .uk-button-default">
                            @foreach ($relatedProducts as $related)
                            <li>
                                <x-product-card :product="$related" />
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="uk-slidenav-container uk-hidden@s uk-light">
                        <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous
                            uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next
                            uk-slider-item="next"></a>
                    </div>

                    <div class="uk-slidenav-container uk-visible@s">
                        <a class="uk-position-center-left-out uk-position-small uk-slidenav-large" href="#"
                            uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right-out uk-position-small uk-slidenav-large" href="#"
                            uk-slidenav-next uk-slider-item="next"></a>
                    </div>
                </div>

                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
            </div>

        </div>
    </section>

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
            if (priceTag.innerText !== originalPrice) {
                priceTag.innerText = originalPrice;
                priceTag.classList.remove('uk-text-danger');
            }
        });
    </script>
</x-app-layout>
