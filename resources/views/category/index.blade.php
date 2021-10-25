<x-app-layout title="Categories">
    <section class="uk-section uk-section-large uk-section-muted uk-padding-bottom">
        <div class="uk-container">
            <div class="uk-width-1-1 uk-panel uk-text-center uk-margin-xlarge">
                <h1 class="uk-heading-small uk-font-bold uk-text-capitalize ">
                    Product Categories
                </h1>
                <hr class="uk-divider-small">
            </div>

            <article
                class="uk-grid uk-child-width-1-1 uk-grid-column-medium uk-grid-row-large uk-grid-match"
                uk-grid>
                @foreach ($parentCategories as $parentCategory)
                    <div>
                        <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin uk-box-shadow" uk-grid>
                            <a href="{{ route('category.show', $parentCategory->slug) }}"
                                class="uk-card-media-left uk-cover-container">
                                <img data-src="{{ asset('storage/' . $parentCategory->cover_image_url)}}"
                                    alt="{{ $parentCategory->name }} Cover Image" uk-cover uk-img>
                                <canvas width="600" height="400"></canvas>
                            </a>
                            <div>
                                <div class="uk-card-body uk-text-center">
                                    <a href="{{ route('category.show', $parentCategory->slug) }}"
                                        class="uk-link-heading uk-heading-small uk-display-block uk-margin-medium-top">
                                            {{ $parentCategory->name }}
                                    </a>

                                    <a href="{{ route('category.show', $parentCategory->slug) }}" class="uk-button uk-button-primary uk-margin-top">View Collection</a>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </article>
        </div>
    </section>
</x-app-layout>
