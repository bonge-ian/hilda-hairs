<x-app-layout title="{{ auth()->user()->name }}'s Profile">
	<section class="uk-section">
		<div class="uk-container">
			<article class="uk-grid uk-grid-divider uk-child-width-1-1" uk-grid>
				@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
					@include('profile.update-profile-information-form')
				@endif

				@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
					@include('profile.update-password-form')
				@endif

				@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
					@include('profile.two-factor-authentication-form')
				@endif
			</article>
		</div>
	</section>
</x-app-layout>
