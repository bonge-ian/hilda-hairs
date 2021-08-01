<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

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
</head>

<body>
	<div id="app">
		<x-navbar />

		<main class="uk-background-muted">

			<aside class="uk-container">
				<div class="uk-margin-top">
					<x-status-alert />
				</div>
			</aside>

			{{ $slot }}
		</main>

		<x-footer />
	</div>

	<!-- App -->
	<script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
