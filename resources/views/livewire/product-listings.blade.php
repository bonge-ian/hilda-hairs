<section class="uk-section uk-section-large uk-padding-small-top">
    <div class="uk-container uk-container-xlarge">
        <div class="uk-grid uk-grid-small uk-flex-middle uk-text-middle" uk-grid>
            <div class="uk-width-expand">
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
            <div class="uk-width-auto uk-text-right@m">
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
                                <select wire:model="sort" name="sort" id="sort" class="uk-select">
                                    <option>Default Sorting</option>
                                    <option value="latest">Latest</option>
                                    <option value="popular">Popular</option>
                                    <option value="price">Price: Low to High</option>
                                    <option value="price-desc">Price: High to Low</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <x-product-grid :products="$products" />
    </div>
</section>
