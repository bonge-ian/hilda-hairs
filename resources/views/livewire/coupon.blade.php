<div class="uk-panel">
    <form wire:submit.prevent="apply" class="uk-grid-small uk-grid" uk-grid>
        @error('code')
        <div class="uk-margin-small uk-width-1-expand">
            <div class="uk-alert uk-alert-danger" uk-alert>
                {{ $message }}
            </div>
        </div>
        @enderror
        <div class="uk-width-1-3">
            <input wire:model="code" type="text" name="code" id="code" class="uk-input" placeholder="Coupon Code" {{
                !$this->isApplicable ? 'disabled' : '' }}>
        </div>
        <div class="uk-width-auto">
            <button type="submit" class="uk-button uk-button-primary" {{ !$this->isApplicable ? 'disabled' : '' }}>
                Apply Coupon
            </button>
        </div>
    </form>
</div>
