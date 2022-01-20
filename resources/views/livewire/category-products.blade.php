<div wire:init="loadProducts" id="products">
    <x-product-grid :products="$products" />
    <a href="#products" class="uk-hidden" uk-scroll="offest: -10"></a>
    <script>
        window.addEventListener('pageUpdated', () => {
            setTimeout(() => {
                UIkit.scroll(document.querySelector("[uk-scroll]"))
                .scrollTo(document.querySelector('#products'))
            }, 1000);
        })
    </script>
</div>
