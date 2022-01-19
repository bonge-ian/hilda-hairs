<section class="uk-section uk-section-muted" wire:init="loadRelatedProducts">
    <div class="uk-container uk-container-expand">

        <div class="uk-width-1-1 uk-margin">
            <div class="uk-panel uk-width-xlarge@m">
                <h4 class="uk-heading-line uk-heading-small uk-text-left">
                    <span>More Like This</span>
                </h4>
            </div>
        </div>

        <div class="uk-slider-container-offset" uk-slider>
            <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                <div class="uk-slider-container">
                    <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-4@l uk-grid uk-grid-column-small"
                        uk-height-match="target: > li > div > .uk-button-default">
                        @forelse ($relatedProducts as $related)
                            <li>
                                <x-product-card :product="$related"/>
                            </li>
                        @empty
                           @foreach (range(1,4) as $item)
                               <li>
                                    <x-skeleton-product-card />
                                </li>
                           @endforeach
                        @endforelse
                    </ul>
                </div>

                <div class="uk-slidenav-container uk-hidden@s uk-light">
                    <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous
                        uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next
                        uk-slider-item="next"></a>
                </div>

                <div class="uk-slidenav-container uk-visible@s">
                    <a class="uk-position-center-left uk-slidenav-large" href="#"
                        uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right  uk-slidenav-large" href="#"
                        uk-slidenav-next uk-slider-item="next"></a>
                </div>
            </div>

            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
        </div>

    </div>
</section>
