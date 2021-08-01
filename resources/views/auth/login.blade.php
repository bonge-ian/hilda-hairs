<x-auth-layout title="Login">
	<x-slot name="cover_image">
		{{ __('https://images.unsplash.com/photo-1521159757827-5d98cfed32f5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80') }}
	</x-slot>
	<x-slot name="cover_image_alt">
		{{ __('door with gray chain lock') }}
	</x-slot>
	<div class="uk-text-center">
		<x-laravel-logo />
		<h2 class="uk-text-muted">{{ __('Sign in to your account') }}</h2>
	</div>

	<form method="POST" action="{{ route('login') }}">
		@csrf
		<div class="uk-margin">
			<label class="uk-form-label">{{ __('Email') }}</label>

			<div class="uk-width-1-1">
				<div class="uk-inline uk-width-1-1">
					<span class="uk-form-icon" uk-icon="icon: mail"></span>
					<input class="uk-input @error('email') uk-form-danger  @enderror " type="email" name="email" value="{{ old('email') }}" required autofocus />
				</div>

				@error('email')
					<x-alert type="danger" :message="$message"></x-alert>
				@enderror
			</div>
		</div>

		<div class="uk-margin">
			<label class="uk-form-label">{{ __('Password') }}</label>
			<div class="uk-width-1-1">
				<div class="uk-inline uk-width-1-1">
					<span class="uk-form-icon" uk-icon="icon: lock"></span>
					<input class="uk-input @error('email') uk-form-danger  @enderror" type="password" name="password" required autocomplete="current-password" />
				</div>

				@error('password')
					<x-alert type="danger" :message="$message"></x-alert>
				@enderror
			</div>
		</div>

		<div class="uk-margin-remove-top">
			<div class="uk-flex uk-flex-between uk-flex-middle">
				<div>
					<label>
						<input class="uk-checkbox" type="checkbox" name="remember" id="remember"
							{{ old('remember') ? 'checked' : '' }}>
						{{ __('Remember Me') }}
					</label>
				</div>
				@if (Route::has('password.request'))
					<div>
						<div class="uk-text-right">
							<a href="{{ route('password.request') }}" class="uk-button uk-button-text uk-text-capitalize">
								<small class="uk-text-small">{{ __('Forgot your password?') }}</small>
							</a>
						</div>
					</div>
				@endif
			</div>
		</div>

		<div class="uk-margin uk-text-center ">
			<x-auth-button>
				{{ __('Login') }}
			</x-auth-button>
		</div>
	</form>

	@if (Route::has('register'))
		<div class="uk-margin-medium-top uk-margin-remove-bottom uk-text-center">
			<div class="uk-text-meta">
				<span>Are you new here?</span>
				<a href="{{ route('register') }}" class="uk-text-primary uk-link-text">
					<small class="uk-text-small">{{ __('Sign up') }}</small>
				</a>
			</div>
		</div>
	@endif
</x-auth-layout>
