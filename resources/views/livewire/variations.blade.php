<div class="uk-panel uk-margin-medium uk-width-xlarge uk-margin-auto@m">
    <div class="uk-grid uk-grid-small uk-flex-middle uk-child-width-1-2 uk-child-width-1-1" uk-grid>
        <div>
            <div class="uk-panel uk-width-1-1">
                <form action="#">
                    <div>
                        <label for="color" class="uk-form-label">Color</label>
                        <div class="uk-form-controls uk-width-1-1">
                            <select wire:model="color" name="color" id="color" class="uk-select">
                                <option value="0">Choose a color</option>
                                @foreach ($colors as $color)
                                <option wire:key="{{ $color }}" value="{{ $color }}">{{ $color }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <div class="uk-panel uk-width-1-1">
                <form action="#" class="uk-form-stacked">
                    <div>
                        <label for="size" class="uk-form-label">Size</label>
                        <div class="uk-form-controls">
                            <select wire:loading.attr="disabled" wire:target="color"  wire:model="size" name="size" id="size" class="uk-select" >

                                <option value="0">--- Pick a color first ---</option>

                                @foreach ($sizes as $size)
                                <option wire:key="{{ $size }}" value="{{ $size }}">{{ $size }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
