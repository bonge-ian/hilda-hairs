<x-app-layout title="Home">
    {{-- hero section --}}
    <section class="hero uk-section uk-section-default uk-padding-remove-vertical">
        <div class="uk-container uk-container-expand">
            <div class="uk-background-cover uk-background-center-left uk-position-relative"
                data-src="{{ asset('storage/img/hero.jpg')}}" uk-img
                uk-height-viewport="offset-top: true; minHeight: 600;">
                <div class="uk-position-cover uk-flex uk-flex-bottom uk-flex-right">
                    <div class="uk-overlay overlay uk-padding-large uk-width-xlarge">
                        <h1 class="uk-text-bold uk-text-uppercase">Elevate your look</h1>

                        <h2 class="uk-h4">
                            Premium weavers, hair extensions, clip ins, frontals and more designed to sprice up your
                            look and give your style game an edge
                        </h2>

                        <a href="shop.html" class="uk-button uk-button-secondary uk-button-large">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- colletions --}}
    <section class="uk-section-default uk-section-large"
        uk-scrollspy="target: [uk-scrollspy-class]; delay: 200;repeat: false;">
        <div class="uk-grid uk-grid-large uk-child-width-1-1" uk-grid>
            <div class="uk-panel uk-width-1-1 uk-text-center" uk-scrollspy-class="uk-animation-fade">
                <h2 class="uk-heading-medium uk-text-bold uk-text-uppercase">Our Collections</h2>
                <hr class="uk-divider-small" />
            </div>

            <div>
                <div class="uk-grid uk-grid-collapse uk-child-width-1-2@m uk-child-width-1-1 uk-grid-match" uk-grid>
                    <div>
                        <div class="uk-panel uk-tile uk-background-cover uk-background-center-center wigs uk-flex uk-flex-center uk-flex-middle"
                            data-src="{{ asset('storage/img/wig.jpg') }} " uk-img>
                            <div class="uk-flex uk-flex-center uk-flex-middle uk-flex-column"
                                uk-scrollspy="uk-animation-fade">
                                <h5 class="uk-h2 uk-margin-remove-bottom uk-text-uppercase uk-text-bold">Exquisite</h5>
                                <h4 class="wig-caption uk-text-uppercase uk-margin-medium-top uk-margin-remove-bottom">
                                    Wigs
                                </h4>
                                <a href="{{ route('category.show', 'wigs') }}" class="uk-button uk-button-large uk-button-primary uk-margin-medium-top">
                                    View Collection
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-grid uk-grid-small uk-child-width-1-1" uk-grid>
                            <div>
                                <div class="uk-grid uk-grid-collapse" uk-grid>
                                    <div class="uk-width-1-2@m">
                                        <div class="uk-panel uk-inline-clip">
                                            <canvas width="1080" height="1350"></canvas>
                                            <img data-src="{{ asset('storage/img/clipins.jpg') }} " width="1080"
                                                height="1350" alt="" uk-cover uk-img />

                                            <div class="
    													clipins
    													uk-position-cover
    													uk-flex
    													uk-flex-center
    													uk-flex-middle
    													uk-flex-column
    													" uk-scrollspy="uk-animation-fade">
                                                <h5 class="
    														uk-h3
    														uk-margin-top
    														uk-margin-remove-bottom
    														uk-text-uppercase
    														uk-text-bold
    											">
                                                    Elite
                                                </h5>
                                                <h4 class="
    														clipin-caption
    														uk-text-uppercase
    														uk-margin-small-top
    														uk-margin-remove-bottom
    														">
                                                    Clip ins
                                                </h4>
                                                <a href="{{ route('category.show', 'clipins') }}"
                                                    class="uk-button uk-button-primary uk-button-large uk-margin">View
                                                    Collection</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-2@m">
                                        <div class="uk-panel uk-inline-clip">
                                            <canvas width="1080" height="1350"></canvas>
                                            <img data-src="{{ asset('storage/img/frontal.jpg') }}" width="1080"
                                                height="1620" alt="" uk-cover uk-img />

                                            <div class="frontals uk-position-cover uk-flex uk-flex-center uk-flex-middle uk-flex-column" uk-scrollspy="uk-animation-fade">
                                                <h5 class=" uk-h3 uk-margin-remove-bottom uk-text-uppercase uk-text-bold ">
                                                    Classy
                                                </h5>
                                                <h4 class="frontal-caption uk-text-uppercase uk-margin-small-top uk-margin-remove-bottom ">
                                                    Frontals
                                                </h4>
                                                <a href="{{ route('category.show', 'frontals') }}"
                                                    class=" uk-button uk-button-primary uk-button-large uk-margin-top ">
                                                    View Collection
                                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="uk-panel uk-inline-clip">
                                    <img data-src="{{ asset('storage/img/lace.jpg') }}" width="1375" height="1080" alt="" uk-img />
                                    <div class="uk-position-cover uk-flex uk-flex-center uk-flex-middle uk-flex-column laces"   uk-scrollspy="uk-animation-fade"
                                    >
                                        <h5 class="uk-h3 uk-margin-remove-bottom uk-text-uppercase uk-text-bold">
                                            Elegant
                                        </h5>
                                        <h4 class="laces-caption uk-text-uppercase uk-margin-small-top uk-margin-remove-bottom ">
                                            Laces
                                        </h4>
                                        <a href="{{ route('category.show', 'laces') }}" class="uk-button uk-button-primary uk-button-large">View
                                            Collection</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-grid uk-grid-medium uk-child-width-1-2@m uk-child-width-1-1 uk-grid-match" uk-grid
            uk-scrollspy="target: [uk-scrollspy-class]; delay: 200; repeat: false">
            <div>
                <div class="uk-panel" >
                    <figure class="uk-inline-clip">
                        <canvas width="960" height="640"></canvas>
                        <img data-src="{{ asset('storage/img/weave.jpg') }} " alt="" width="960" height="640" uk-cover
                            uk-img />

                        <div class="uk-position-cover uk-flex uk-flex-column uk-flex-center uk-flex-middle weaves">
                            <h5 class="uk-h3 uk-margin-top uk-margin-remove-bottom uk-text-uppercase uk-text-bold"
                                uk-scrollspy-class="uk-animation-slide-left-small">
                                Dainty
                            </h5>
                            <h4 class="weave-caption uk-text-uppercase uk-margin-small-top uk-margin-remove-bottom"
                                uk-scrollspy-class="uk-animation-slide-left-small">
                                Weaves
                            </h4>
                            <a href="{{ route('category.show', 'weaves') }}" class="uk-button uk-button-secondary uk-button-large uk-margin"
                                uk-scrollspy-class="uk-animation-slide-left-small">View Collection</a>
                        </div>
                    </figure>
                </div>
            </div>
            <div>
                <div class="uk-panel" >
                    <figure class="uk-inline-clip">
                        <canvas width="960" height="640"></canvas>
                        <img data-src="{{ asset('storage/img/ext.jpg') }}" alt="" width="960" height="640" uk-cover
                            uk-img />

                        <div class="uk-position-cover uk-flex uk-flex-column uk-flex-center uk-flex-middle extensions ">
                            <h5 class="uk-h3 uk-margin-top uk-margin-remove-bottom uk-text-uppercase uk-text-bold"
                                uk-scrollspy-class="uk-animation-slide-right-small">
                                Deluxe
                            </h5>
                            <h4 class="extension-caption uk-text-uppercase uk-margin-small-top uk-margin-remove-bottom "
                                uk-scrollspy-class="uk-animation-slide-right-small">
                                Extensions
                            </h4>
                            <a href="{{ route('category.show', 'hair-extensions') }}" class="uk-button uk-button-secondary uk-button-large uk-margin"
                                uk-scrollspy-class="uk-animation-slide-right-small">View Collection</a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </section>

    {{-- about us intro --}}
    <section class="uk-section uk-section-default"
        uk-scrollspy="target: [uk-scrollspy-class]; delay: 200;repeat: false;">
        <div class="uk-grid uk-grid-medium uk-child-width-1-1 uk-grid-match" uk-grid>
            <aside class="uk-width-1-3@m">
                <div class="uk-cover-container" uk-scrollspy-class="uk-animation-slide-left-medium">
                    <canvas width="619" height="929"></canvas>
                    <img data-src="{{ asset('storage/img/happy.jpg')}}" alt="" width="619" height="929" uk-cover
                        uk-img />
                </div>
                <div class="uk-tile" uk-scrollspy-class="uk-animation-slide-left-medium">
                    <h5 class="uk-h2 uk-text-uppercase uk-text-bold">About Us</h5>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate, beatae cumque odit
                        architecto incidunt dolore?
                    </p>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi ex expedita recusandae
                        rerum ipsam consectetur, ab aliquid beatae earum rem?
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit minus et velit nobis, quod
                        itaque, delectus eos minima pariatur sed dolor.
                    </p>
                    <a href="#" class="uk-button uk-button-default">Check us Out</a>
                </div>
            </aside>
            <div class="uk-width-2-3@m">
                <div class="uk-tile uk-tile-large uk-padding-remove-horizontal uk-padding-remove-bottom">
                    <div class="uk-card uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
                        <div class="uk-flex-last@s uk-card-media-right uk-cover-container"
                            uk-scrollspy-class="uk-animation-slide-right-medium">
                            <img data-src="{{ asset('storage/img/happy2.jpg') }}" alt="" uk-cover uk-img />
                            <canvas width="600" height="400"></canvas>
                        </div>
                        <div>
                            <div class="uk-card-body" uk-scrollspy-class="uk-animation-fade">
                                <h3 class="uk-heading-medium uk-text-uppercase uk-text-bold">Perfect your style</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-padding-large">
                    <div class="uk-flex uk-flex-right@m uk-flex-middle">
                        <div class="uk-width-2xlarge@m">
                            <figure class="uk-cover-container" uk-scrollspy-class="uk-animation-slide-right-medium">
                                <canvas width="600" height="839"></canvas>
                                <img data-src="{{ asset('storage/img/ponytail.jpg') }}" alt="" width="600" height="839"
                                    uk-cover uk-img />
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- featured --}}
    <section class="uk-section uk-section-muted uk-section-large">
        <div class="uk-container uk-container-xlarge uk-container-expand-right">
            <div class="uk-grid uk-grid-medium uk-child-width-1-1 uk-grid-match" uk-grid
                uk-scrollspy="target: [uk-scrollspy-class];cls: uk-animation-slide-bottom-medium;delay: 200;">
                <aside class="uk-width-1-3@l">
                    <div class="uk-tile uk-tile-large uk-panel">
                        <h4 class="uk-h1 uk-text-bold uk-text-uppercase"
                            uk-scrollspy-class="uk-animation-slide-top-small">
                            Featured Collection
                        </h4>
                        <hr uk-scrollspy-class="uk-animation-slide-top-small" class="uk-divider-small" />
                        <p class="uk-text-lead" uk-scrollspy-class="uk-animation-slide-bottom-small">
                            We gotcha sis! <br />
                            Explore our selected collection across all our categories.
                        </p>
                        <a href="#" class="uk-text-primary uk-button uk-button-text uk-margin-top"
                            uk-scrollspy-class="uk-animation-slide-bottom-small">Shop Now</a>
                    </div>
                </aside>
                <div class="uk-width-2-3@l uk-flex-middle" uk-scrollspy-class="uk-animation-slide-bottom-medium">
                    <div class="uk-panel uk-width-1-1">
                        <div class="uk-text-center uk-container-item-padding-remove-right uk-slider uk-slider-container"
                            uk-slider="autoplay: 1;">
                            <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                                <ul class="uk-slider-items uk-grid uk-grid-small">
                                    @foreach ($featuredProducts as $product)
                                        <li class="uk-width-5-6 uk-width-1-2@s uk-width-1-3@m">
                                            <x-product-card :product="$product" />
                                        </li>
                                    @endforeach

                                </ul>
                                <div
                                    class="uk-visible@m uk-hidden-hover uk-hidden-touch uk-slidenav-container uk-position-top-right">
                                    <a class="uk-slidenav-large uk-icon uk-slidenav-previous uk-slidenav" href="#"
                                        uk-slidenav-previous="" uk-slider-item="previous">
                                    </a>
                                    <a class="uk-slidenav-large uk-icon uk-slidenav-next uk-slidenav" href="#"
                                        uk-slidenav-next="" uk-slider-item="next">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- steps --}}
    <section class="uk-section uk-section-large uk-section-secondary uk-preserve-color"
        uk-scrollspy="target: [uk-scrollspy-class]; delay: 200;cls: uk-animation-slide-bottom-medium">
        <div class="uk-container uk-container-expand">
            <div class="uk-text-center uk-width-1-1 uk-margin" uk-scrollspy-class>
                <h3 class="uk-heading-small uk-text-bold">Just 3 Steps</h3>
                <p class="uk-text-lead">Facilitate your choice of perfect hair in 3 simple steps.</p>
            </div>
            <div class="uk-margin-large uk-text-center">
                <article
                    class="uk-child-width-1-1 uk-child-width-1-3@m uk-grid-large uk-grid-divider uk-grid-match uk-grid"
                    uk-grid uk-scrollspy-class>
                    <div>
                        <div class="uk-margin-auto uk-width-medium uk-panel">
                            <div class="uk-icon uk-text-primary" uk-icon="icon: product-search; ratio: 3"></div>
                            <h4 class="uk-margin-top uk-margin-remove-bottom uk-h3">Select your product</h4>
                            <div class="uk-panel uk-margin-top">
                                <p>
                                    Browse through our rich collections and find the hair that fits your texture,
                                    and your preferred style.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-margin-auto uk-width-medium uk-panel">
                            <div class="uk-icon uk-text-primary" uk-icon="icon: add-to-cart; ratio: 3.5"></div>
                            <h4 class="uk-margin-top uk-margin-remove-bottom uk-h3">Confirm your order</h4>
                            <div class="uk-panel uk-margin-top">
                                <p>
                                    Confirm your order after finding the right merch. Fill in the nitty-gritty
                                    stuff, order notes, address information, name, phone etc for a recherché online
                                    experience
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-margin-auto uk-width-medium uk-panel">
                            <div class="uk-icon uk-text-primary" uk-icon="icon: delivery; ratio: 3"></div>
                            <h4 class="uk-margin-top uk-margin-remove-bottom uk-h3">Await your merch</h4>
                            <div class="uk-panel uk-margin-top">
                                <p>
                                    Your merch will be delivered to your desired location. Payment for the merch
                                    will be done after delivery.
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="uk-text-center" uk-scrollspy-class>
                <a href="#" class="uk-button uk-button-default">Learn More</a>
            </div>
        </div>
    </section>
</x-app-layout>
