<x-app-layout title="Categories">
    <section class="uk-section uk-section-large uk-section-default uk-padding-remove-bottom">
        <div class="uk-container uk-container-expand">
            <div class="uk-width-1-1 uk-panel uk-text-center uk-margin-xlarge">
                <h1 class="uk-heading-small uk-font-bold uk-text-capitalize ">
                    Product Categories
                </h1>
                <hr class="uk-divider-small">
            </div>

            <article class="uk-grid uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-column-medium uk-grid-row-large uk-grid-match" uk-grid>
                @foreach ($parentCategories as $parentCategory)
                    <div>
                        <div class="uk-panel uk-text-center">
                            <a href="{{ route('category.show', $parentCategory->slug) }}" class="uk-cover-container">
                                <canvas width="490" height="513"></canvas>
                                <img data-src="{{ asset('storage/' . $parentCategory->cover_image_url)}}"
                                    alt="{{ $parentCategory->name }} Cover Image" width="490" height="513" uk-img uk-cover>
                            </a>
                            <h3 class="uk-margin-top">
                                <a href="{{ route('category.show', $parentCategory->slug) }}" class="uk-link-heading">
                                    {{ $parentCategory->name }}
                                </a>
                            </h3>
                        </div>
                    </div>
                @endforeach
            </article>
        </div>
    </section>
</x-app-layout>
