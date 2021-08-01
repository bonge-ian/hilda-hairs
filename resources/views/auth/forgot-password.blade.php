<x-auth-layout title="Forgot Password">
	<x-slot name="cover_image">
		{{ __('https://images.pexels.com/photos/7534774/pexels-photo-7534774.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260') }}
	</x-slot>
	<x-slot name="cover_image_alt">
		{{ __('Man in Black Leather Jacket Covering His Face') }}
	</x-slot>
	<div class="uk-text-center">
		<x-laravel-logo />

		<h2 class="uk-text-muted">{{ __('Forgot Password?') }}</h2>
		<p>
			{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
		</p>
	</div>

	<form method="POST" action="{{ route('password.email') }}">
		@csrf
		<div class="uk-margin">
			<label class="uk-form-label">{{ __('Email') }}</label>

			<div class="uk-width-1-1">
				<div class="uk-inline uk-width-1-1">
					<span class="uk-form-icon" uk-icon="icon: mail"></span>
					<input class="uk-input @error('email') uk-form-danger @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus />
				</div>

				@error('email')
					<x-alert type="danger" :message="$message"></x-alert>
				@enderror
			</div>

		</div>

		<div class="uk-margin uk-text-center">
			<x-auth-button>
				{{ __('Send Link') }}
			</x-auth-button>
		</div>
	</form>

	<div class="uk-margin-medium-top uk-margin-remove-bottom uk-text-center uk-flex uk-flex-center">
		<div class="uk-text-meta">
			<a href="{{ route('login') }}" class="uk-text-primary uk-link-text">
				<small class="uk-text-small">{{ __('Back to login') }}</small>
			</a>
		</div>
	</div>
</x-auth-layout>
