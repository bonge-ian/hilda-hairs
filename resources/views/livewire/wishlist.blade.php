<div>
    <button wire:click="like" @class([ 'uk-width-1-1 uk-text-primary uk-icon like' , 'liked'=>
        $this->product->likedBy(Auth::user()) ?? false
        ])
        uk-icon="icon: heart; ratio: {{ $this->ratio }}">
    </button>
</div>

@once
@push('scripts')
<script>
    // var likeIcon = document.querySelector('.like');
        window.addEventListener(
            'like-product',
            event => {
                let elem = event.srcElement.firstElementChild;
                elem.classList.add('liked');

                UIkit.notification({
                    message: `<span class='uk-icon uk-margin-small-right' uk-icon='icon: check-circle'></span> ${event.detail.message}`,
                    status: 'primary',
                    pos: 'top-right',
                    timeout: 4000
                });
            }
        );
        window.addEventListener(
            'unlike-product',
            event => {
                let elem = event.srcElement.firstElementChild;
                elem.classList.remove('liked');

                UIkit.notification({
                    message: `<span class='uk-icon uk-margin-small-right' uk-icon='icon: check-circle'></span> ${event.detail.message}`,
                    status: 'danger',
                    pos: 'top-right',
                    timeout: 4000
                });
            }
        );
</script>
@endpush
@endonce
