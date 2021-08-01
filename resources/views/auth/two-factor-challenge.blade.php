<x-auth-layout title="Verification">
	<x-slot name="cover_image">
		{{ __('https://images.pexels.com/photos/6963067/pexels-photo-6963067.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260') }}
	</x-slot>
	<x-slot name="cover_image_alt">
		{{ __('Man and Woman Sitting at Table') }}
	</x-slot>
	<div class="uk-text-center">
		<x-laravel-logo />
		<h2 class="uk-text-muted">{{ __('Two-Factor Code') }}</h2>
	</div>

	<form method="POST" action="{{ url('/two-factor-challenge') }}">
		@csrf
		<div class="uk-margin">
			<label class="uk-form-label">{{ __('Password') }}</label>
			<div class="uk-width-1-1">
				<div class="uk-inline uk-width-1-1">
					<span class="uk-form-icon" uk-icon="icon: phone"></span>
					<input class="uk-input @error('code') 'uk-form-danger' @enderror" type="text" name="code" autofocus autocomplete="one-time-code" />
				</div>

				@error('code')
					<x-alert type="danger" :message="$message"></x-alert>
				@enderror
			</div>
		</div>

		{{-- ** OR ** --}}

		<div class="confirmation-method" hidden>
			<div>
				{{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
			</div>

			<div class="uk-margin">
				<label class="uk-form-label">{{ __('Recovery Code') }}</label>

				<div class="uk-inline uk-width-1-1">
					<span class="uk-form-icon" uk-icon="icon: list"></span>
					<input class="uk-input @error('recovery_code') 'uk-form-danger' @enderror" type="text" name="recovery_code" autocomplete="one-time-code" />
				</div>

				@error('recovery_code')
					<x-alert type="danger" :message="$message"></x-alert>
				@enderror
			</div>
		</div>

		<div class="uk-margin uk-text-center ">
			<x-auth-button>
				{{ __('Login') }}
			</x-auth-button>
		</div>

		<div class="uk-text-center">
			<a class="confirmation-method" uk-toggle="target: .confirmation-method">
				<small class="uk-text-small">{{ __('Use a recovery code') }}</small>
			</a>

			<a class="confirmation-method" uk-toggle="target: .confirmation-method" hidden>
				<small class="uk-text-small">{{ __('Use an authentication code') }}</small>
			</a>
		</div>
	</form>

</x-auth-layout>
