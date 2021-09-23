<footer class="uk-section uk-section-large"
    uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-slide-left-small; delay: false;">
    <div class="uk-container uk-container-expand">
        <div class="uk-grid-row-large uk-grid-margin-large uk-grid uk-grid-match" uk-grid>
            <div class="uk-width-1-1@s uk-width-2-5@m">
                <div class="uk-margin uk-text-left" uk-scrollspy-class>
                    <a href="index.html" class="uk-icon uk-preserve" uk-icon="icon: logo; ratio: 3"></a>
                </div>
                <div class="uk-panel uk-width-medium@m uk-margin" uk-scrollspy-class>
                    <p>
                        Your only stop for premium hair extensions, clip ins, weaves, frontals laces and many
                        more designed to elevate your look.
                    </p>
                </div>
            </div>
            <div class="uk-width-1-2 uk-width-1-3@s uk-width-1-5@m">
                <ul class="uk-nav uk-nav-default" uk-scrollspy-class>
                    <li class="uk-nav-header">Categories</li>
                    <li><a href="{{ route('category.show', 'wigs') }}">Wigs</a></li>
                    <li><a href="{{ route('category.show', 'weaves') }}">Weaves</a></li>
                    <li><a href="{{ route('category.show', 'hair-extensions') }}">Hair Extensions</a></li>
                </ul>
            </div>
            <div class="uk-width-1-2 uk-width-1-3@s uk-width-1-5@m">
                <ul class="uk-nav uk-nav-default" uk-scrollspy-class>
                    <li class="uk-nav-header">Services</li>
                    <li><a href="{{ route('product.index') }}">Inventory</a></li>
                    <li><a href="#">About us </a></li>
                    <li><a href="#">How it works</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </div>
            <div class="uk-width-1-3@s uk-width-1-5@m">
                <h4 class="uk-margin uk-text-uppercase uk-margin-remove-top" uk-scrollspy-class>Hilda</h4>
                <address class="uk-panel uk-margin" uk-scrollspy-class>
                    Kona Ruiru <br />
                    Kiambu County <br />
                    Kenya <br />
                </address>
                <div class="uk-margin-top" uk-scrollspy-class>
                    <ul class="uk-nav uk-nav-default">
                        <li class="uk-nav-header">Services</li>
                        <li><a href="#">info@hilda.co.ke</a></li>
                        <li><a href="#">+254711478523</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="uk-section-default uk-section uk-section-small uk-padding-remove-top"
    uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-slide-left-small; delay: false;">
    <div class="uk-container uk-container-xlarge">
        <div class="uk-child-width-1-1 uk-grid-margin uk-grid uk-grid-stack" uk-grid="">
            <div class="uk-width-1-1@m" uk-scrollspy-class>
                <hr />
            </div>
        </div>
        <div class="uk-grid-margin uk-grid uk-flex-middle" uk-grid="">
            <div class="uk-width-1-2@s" uk-scrollspy-class>
                <div class="uk-panel uk-text-meta uk-margin">
                    ©
                    <script>
                        document.currentScript.insertAdjacentHTML(
                            'afterend',
                            '<time datetime="' +
                            new Date().toJSON() +
                            '">' +
                            new Intl.DateTimeFormat(document.documentElement.lang, {
                                year: 'numeric',
                            }).format() +
                            '</time>'
                        );
                    </script>
                    Hilda. All rights reserved. Cobbled together by
                    <a href="https://bonge-inc.co.ke/" class="uk-link-heading">Bonge Inc.</a>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <div class="uk-margin uk-text-right@s" uk-scrollspy-class="uk-animation-slide-right-small">
                    <div class="uk-child-width-auto uk-grid-medium uk-flex-inline uk-grid" uk-grid="">
                        <div>
                            <a class="uk-icon-button uk-icon" href="https://facebook.com/yootheme" target="_blank"
                                rel="noreferrer" uk-icon="icon: facebook;"></a>
                        </div>
                        <div>
                            <a class="uk-icon-button uk-icon" href="https://twitter.com/yootheme" target="_blank"
                                rel="noreferrer" uk-icon="icon: twitter;"></a>
                        </div>
                        <div>
                            <a class="uk-icon-button uk-icon" href="https://www.instagram.com/" target="_blank"
                                rel="noreferrer" uk-icon="icon: instagram;"></a>
                        </div>
                        <div>
                            <a class="uk-icon-button uk-icon"
                                href="https://www.youtube.com/channel/UCScfGdEgRCOh9YJdpGu82eQ" target="_blank"
                                rel="noreferrer" uk-icon="icon: youtube;"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
