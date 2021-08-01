<section class="uk-width-1-1">
    <div class="uk-card uk-card-default uk-box-shadow-small">
        <div class="uk-card-body">
            <div class="uk-grid uk-child-width-1-1 uk-grid-stack" uk-grid>
                <div class="uk-width-2-5@s">
                    <h4 class="uk-margin-remove-bottom">{{ $title }}</h4>
                    <p>{{ $message }}</p>
                </div>
                <div class="uk-width-3-5@s ">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @if (isset($cta) && isset($submit_form_id))
            <div class="uk-card-footer uk-background-muted">
                <div class="uk-margin uk-text-right">

                    <button class="uk-button uk-button-primary" form="{{ $submit_form_id }}">
                        {{ $cta }}
                    </button>
                </div>
            </div>
        @endif
    </div>
</section>
