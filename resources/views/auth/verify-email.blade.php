<x-auth-layout title="Verify Email">
	<x-slot name="cover_image">
		{{ __('https://images.pexels.com/photos/6963918/pexels-photo-6963918.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260') }}
	</x-slot>
	<x-slot name="cover_image_alt">
		{{ __('White man and Asian woman going over some documents') }}
	</x-slot>
	<div class="uk-text-center">
		<x-laravel-logo />
		<h2 class="uk-text-muted">{{ __('Verify Your Email') }}</h2>

		<p>
			{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
		</p>

	</div>

	<form method="POST" action="{{ route('verification.send') }}">
		@csrf
		<div class="uk-margin uk-text-center ">
			<x-auth-button>
				{{ __('Resend email link') }}
			</x-auth-button>
		</div>
	</form>


	<div class="uk-margin-medium-top uk-margin-remove-bottom uk-text-center">
		<div class="uk-text-meta">
			<span>Already verified?</span>
			<a href="{{ route('login') }}" class="uk-text-primary uk-link-text">
				<small class="uk-text-small">{{ __('Sign in') }}</small>
			</a>
		</div>
	</div>

</x-auth-layout>
