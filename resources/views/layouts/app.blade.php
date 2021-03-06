<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.svg')}}" type="image/x-icon">

	@isset($title)
	<title>{{ config('app.name', 'Laravel') }} - {{ $title }}</title>
	@else
	<title>{{ config('app.name', 'Laravel') }}</title>
	@endisset

	<!-- Scripts -->
	<script src="{{ mix('js/manifest.js') }}"></script>
	<script src="{{ mix('js/vendor.js') }}"></script>

	<!-- Fonts -->
	{{-- <link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;700&display=swap" rel="stylesheet" /> --}}
	<link rel="stylesheet" href="https://use.typekit.net/hhr1prl.css">

	<!-- Styles -->
	<link rel="stylesheet" href="{{ mix('css/app.css') }}" />
	<livewire:styles />
</head>

<body>
	<div id="app">
		<x-navbar />

		<main class="uk-background-muted">

			@if (session('status'))
                <aside class="uk-container">
                    <div class="uk-margin-top">
                        <x-status-alert />
                    </div>
                </aside>
            @endif

			{{ $slot }}
		</main>

		<x-footer />
	</div>

	<!-- App -->
	<script src="{{ mix('js/app.js') }}"></script>
	<livewire:scripts/>
	<script>
		document.addEventListener("livewire:load", () => {
			window.livewire.hook("element.updated", (el, component) => {
				if (el.hasAttribute("uk-icon")) {
					UIkit.icon(el, {
						icon: el.getAttribute("uk-icon"),
					});
				}

				if (el.hasAttribute("uk-pagination-previous")) {
					UIkit.icon(el, {
						icon: el.getAttribute("uk-pagination-previous"),
					});
				}

				if (el.hasAttribute("uk-pagination-next")) {
					UIkit.icon(el, {
						icon: el.getAttribute("uk-pagination-next"),
					});
				}

				if (el.hasAttribute("uk-img")) {
					UIkit.img(el, {
						dataSrc: el.getAttribute("data-src"),
					});
				}
			});

            var likeIcon = document.querySelector('.like');

		});
           window.addEventListener('item-already-stored', event => {
                UIkit.notification({
                    message: `<span class='uk-icon uk-margin-small-right' uk-icon='icon: warning'></span> ${event.detail.message}`,
                    status: 'warning',
                    pos: 'top-right',
                    timeout: 3000
                });
            })
            window.addEventListener('item-added-to-cart', event => {
                UIkit.notification({
                    message: `<span class='uk-icon uk-margin-small-right' uk-icon='icon: check-circle'></span> ${event.detail.message}`,
                    status: 'success',
                    pos: 'top-right',
                    timeout: 3000
                });
            })
	</script>
    @stack('scripts')
</body>

</html>
