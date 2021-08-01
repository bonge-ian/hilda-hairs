@props(['errors' => $errors])

@if ($errors->any())
	<x-alert type="danger">
		<p class="uk-text-bold">{{ __('Whoops! Something went wrong.') }}</p>

		<ul class="uk-list uk-list-hyphen">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</x-alert>
@endif
