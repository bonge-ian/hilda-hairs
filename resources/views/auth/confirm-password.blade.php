<x-auth-layout title="Confirm Password">
	<x-slot name="cover_image">
		{{ __('https://images.pexels.com/photos/6963067/pexels-photo-6963067.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260') }}
	</x-slot>

	<x-slot name="cover_image_alt">
		{{ __('Man and Woman Sitting at Table') }}
	</x-slot>

	<div class="uk-text-center">
		<x-laravel-logo />
		<h2 class="uk-text-muted">{{ __('Password') }}</h2>

		<p class="uk-text-danger">{{ __('For your security, please confirm your password to continue.') }}</p>
	</div>

	<form method="POST" action="{{ route('password.confirm') }}">
		@csrf
		<div class="uk-margin">
			<label class="uk-form-label">{{ __('Password') }}</label>
			<div class="uk-width-1-1">
				<div class="uk-inline uk-width-1-1">
					<span class="uk-form-icon" uk-icon="icon: lock"></span>
					<input class="uk-input @error('email') uk-form-danger @enderror" type="password" name="password" required autocomplete="current-password" />
				</div>
				@error('password')
					<x-alert type="danger" :message="$message"></x-alert>
				@enderror
			</div>
		</div>

		<div class="uk-margin uk-text-center ">
			<x-auth-button>
				{{ __('Confirm Password') }}
			</x-auth-button>
		</div>
	</form>

	@if (Route::has('password.request'))
		<div class="uk-text-center">
			<a href="{{ route('password.request') }}">
				<small class="uk-text-small">{{ __('Forgot Your Password?') }}</small>
			</a>
		</div>
	@endif

</x-auth-layout>
