<x-app-layout title="{{ $category->name }}">
    @if ($category->cover_image_url)
    <section class="uk-section-default uk-light">
        <div class="uk-background-norepeat uk-background-cover uk-section-xlarge uk-section uk-background-top-center uk-background-secondary uk-background-blend-soft-light"
            data-src="{{ asset('img/' . $category->cover_image_url) }}" uk-img>
            <div class="uk-container uk-container-xlarge">
                <div class="uk-grid uk-grid-margin uk-child-width-1-1" uk-grid>
                    <div class="uk-panel">
                        <h1 class="uk-text-uppercase uk-text-bold uk-heading-large uk-margin-xlarge uk-text-center">
                            {{ $category->name }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if ($category->children->count())
        <section class="uk-section uk-section-muted uk-section-xsmall">
            <div class="uk-container uk-container-xlarge">
                <div class="uk-margin-medium uk-text-center">
                    <div class="uk-child-width-auto uk-flex-center uk-grid-match uk-grid" uk-grid
                        uk-height-match="target: > div > a > img">
                        @foreach ($category->children as $subCategory)
                            <div class="uk-panel">
                                <a href="{{ route('category.show', $subCategory->slug) }}">
                                    {{-- <canvas></canvas> --}}
                                    <img src="{{ asset('img/' . $subCategory->cover_image_url ) }}"
                                        alt="{{ $subCategory->name }} Thumbnail" width="70" height="70">
                                </a>
                                <h2 class="uk-h6 uk-margin-small-top uk-margin-remove-bottom">
                                    <a href="{{ route('category.show', $subCategory->slug) }}" class="uk-link-heading">
                                        {{ $subCategory->name }}
                                    </a>
                                </h2>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- breadcrumbs --}}
    <section class="uk-section uk-section-secondary uk-preserve-color">
        <div class="uk-container uk-container-large">
            <div class="uk-width-1-1 uk-panel uk-margin">
                <x-breadcrumbs />
            </div>

           <x-product-grid :products="$products"/>

           <hr class="uk-margin-xlarge">
        </div>
    </section>
</x-app-layout>
