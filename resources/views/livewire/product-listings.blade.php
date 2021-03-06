<div>
    <section wire:init="loadPosts" class="uk-section uk-section-large uk-padding-small-top uk-position-relative">
        <div class="uk-container uk-container-xlarge">
            {{-- sorting section --}}
            <aside class="uk-grid uk-grid-small uk-child-width-1-1 uk-flex-middle uk-text-middle" uk-grid>
                <div class="uk-width-expand@m">
                    <nav class="uk-panel uk-width-1-1 uk-tile-muted">
                        <ul class="uk-breadcrumb">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <span>Products</span>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="uk-width-auto@m uk-text-right@m">
                    <div class="uk-panel uk-width-1-1 uk-tile-muted">
                        <form class="uk-form-horizontal">
                            <div class="uk-grid uk-grid-small" uk-grid>
                                <div class="uk-width-auto uk-panel">
                                    <label for="sort" class="uk-form-label">
                                        <span class="uk-preserve uk-icon uk-margin-small-right"
                                            uk-icon="icon: filter"></span>
                                        <span>Sort By: </span>
                                    </label>
                                </div>

                                <div class="uk-width-expand uk-panel ">
                                    <select wire:loading.attr="disabled" wire:model="sort" id="sort" class="uk-select">
                                        <option>Default Sorting</option>
                                        <option value="latest">Latest</option>
                                        <option value="popular">Popular</option>
                                        <option value="price-asc">Price: Low to High</option>
                                        <option value="price-desc">Price: High to Low</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </aside>

            <div class="uk-width-1-1 uk-margin" id="product-listings">
                <x-product-grid :products="$products" />
            </div>

            <div class="uk-position-bottom-right uk-position-small uk-hidden">
                <a href="#product-listings" class="uk-icon-button" uk-totop uk-scroll="offset: 160"></a>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        Livewire.on('pageUpdated', () => {
        setTimeout(() => {
            UIkit.scroll(
                document.querySelector("[uk-totop]")
            )
            .scrollTo(
                document.querySelector('#product-listings')
            );
        }, 900);
    })

    </script>
    @endpush
</div>
