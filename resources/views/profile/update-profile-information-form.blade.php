<x-profile-settings-card>
	<x-slot name="title">{{ __('Profile Information') }}</x-slot>
	<x-slot name="message">{{ __('Update your account\'s profile information and email address.') }}</x-slot>

	<form method="POST" action="{{ route('user-profile-information.update') }}" id="profile-update-info">
		@csrf
		@method('PUT')

		<div class="uk-margin uk-width-large">
			<label class="uk-form-label">{{ __('Name') }}</label>

			<div class="uk-width-1-1">
				<div class="uk-inline uk-width-1-1">
					<span class="uk-form-icon" uk-icon="icon: user"></span>
					<input class="uk-input @error('name', 'updateProfileInformation') uk-form-danger @enderror" type="text" name="name" value="{{ old('name') ?? auth()->user()->name }}" required autofocus autocomplete="name" />
				</div>

				@error('name', 'updateProfileInformation')
					<x-alert type="danger" :message="$message" />
				@enderror
			</div>
		</div>


		<div class="uk-margin uk-width-large">
			<label class="uk-form-label">{{ __('Email') }}</label>

			<div class="uk-width-1-1">
				<div class="uk-inline uk-width-1-1">
					<span class="uk-form-icon" uk-icon="icon: mail"></span>
					<input class="uk-input @error('email', 'updateProfileInformation') uk-form-danger @enderror" type="email" name="email" value="{{ old('email') ?? auth()->user()->email }}" required />
				</div>
				@error('email', 'updateProfileInformation')
					<x-alert type="danger" :message="$message" />
				@enderror
			</div>
		</div>
	</form>

	<x-slot name="submit_form_id">{{ _('profile-update-info') }}</x-slot>
	<x-slot name="cta">{{ _('Save') }}</x-slot>
</x-profile-settings-card>
