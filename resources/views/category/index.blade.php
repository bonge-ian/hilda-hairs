<x-app-layout title="Categories">
    <section class="uk-section uk-section-large uk-section-default uk-padding-remove-bottom">
        <div class="uk-container uk-container-expand">
            <div class="uk-width-1-1 uk-panel uk-text-center uk-margin-xlarge">
                <h1 class="uk-heading-small uk-font-bold uk-text-capitalize ">
                    Product Categories
                </h1>
            </div>

            <article class="uk-grid uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-column-small uk-grid-row-large uk-grid-match" uk-grid>
                @foreach ($parentCategories as $parentCategory)
                    <div>
                        <div class="uk-panel uk-text-center">
                            <a href="{{ route('category.show', $parentCategory->slug) }}" class="uk-cover-container">
                                <canvas width="640" height="480"></canvas>
                                <img data-src="{{ asset('storage/' . $parentCategory->cover_image_url)}}"
                                    alt="{{ $parentCategory->name }} Cover Image" width="640" height="480" uk-img uk-cover>
                            </a>
                            <h2 class="uk-margin-top">
                                <a href="{{ route('category.show', $parentCategory->slug) }}" class="uk-link-heading">
                                    {{ $parentCategory->name }}
                                </a>
                            </h2>
                        </div>
                    </div>
                @endforeach
            </article>
        </div>
    </section>
</x-app-layout>
