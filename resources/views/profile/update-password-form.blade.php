<x-profile-settings-card>
	<x-slot name="title">{{ __('Update Password') }}</x-slot>
	<x-slot name="message">{{ __('Ensure your account is using a long, random password to stay secure.') }}</x-slot>

	<form method="POST" action="{{ route('user-password.update') }}" id="profile-update-password">
		@csrf
		@method('PUT')

		<div class="uk-margin uk-width-large">
			<label class="uk-form-label">{{ __('Current Password') }}</label>

			<div class="uk-width-1-1">
				<div class="uk-inline uk-width-1-1">
					<span class="uk-form-icon" uk-icon="icon: unlock"></span>
					<input class="uk-input @error('current_password', 'updatePassword') uk-form-danger @enderror" type="password" name="current_password" required autocomplete="current-password" />
				</div>
				@error('current_password', 'updatePassword')
					<x-alert type="danger" :message="$message" />
				@enderror
			</div>
		</div>

		<div class="uk-margin uk-width-large">
			<label class="uk-form-label">{{ __('Password') }}</label>

			<div class="uk-width-1-1">
				<div class="uk-inline uk-width-1-1">
					<span class="uk-form-icon" uk-icon="icon: lock"></span>
					<input class="uk-input @error('password', 'updatePassword') uk-form-danger @enderror" type="password" name="password" required autocomplete="new-password" />
				</div>
				@error('password', 'updatePassword')
					<x-alert type="danger" :message="$message" />
				@enderror
			</div>
		</div>

		<div class="uk-margin uk-width-large">
			<label class="uk-form-label">{{ __('Confirm Password') }}</label>

			<div class="uk-width-1-1">
				<div class="uk-inline uk-width-1-1">
					<span class="uk-form-icon" uk-icon="icon: check"></span>
					<input class="uk-input @error('password_confirmation', 'updatePassword') uk-form-danger @enderror" type="password" name="password_confirmation" required autocomplete="new-password" />
				</div>
				@error('password_confirmation', 'updatePassword')
					<x-alert type="danger" :message="$message" />
				@enderror
			</div>
		</div>
	</form>

	<x-slot name="submit_form_id">{{ __('profile-update-password') }}</x-slot>
	<x-slot name="cta">{{ __('Update Password') }}</x-slot>
</x-profile-settings-card>
