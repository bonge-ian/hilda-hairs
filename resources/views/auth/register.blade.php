<x-auth-layout title="Register">
    <x-slot name="cover_image">
        {{ __('https://images.pexels.com/photos/3127880/pexels-photo-3127880.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260') }}
    </x-slot>
    <x-slot name="cover_image_alt">
        {{ __('Join Us Scrabbles Letters') }}
    </x-slot>
    <div class="uk-text-center">
        <x-laravel-logo />
        <h2 class="uk-text-muted">{{ __('New here? Create an account with us') }}</h2>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="uk-margin">
            <label class="uk-form-label">{{ __('Name') }}</label>

            <div class="uk-width-1-1">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input class="uk-input @error('name') uk-form-danger  @enderror" type="text" name="name"
                        value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Marie Hilda" />
                </div>

                @error('name')
                <x-alert type="danger" :message="$message"></x-alert>
                @enderror
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label">{{ __('Email') }}</label>

            <div class="uk-width-1-1">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: mail"></span>
                    <input class="uk-input @error('email') uk-form-danger  @enderror" type="email" name="email"
                        value="{{ old('email') }}" required placeholder="marie.hilda@gmail.com" />
                </div>

                @error('email')
                <x-alert type="danger" :message="$message"></x-alert>
                @enderror
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label">{{ __('Phone') }}</label>

            <div class="uk-width-1-1">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: phone"></span>
                    <input class="uk-input @error('phone') uk-form-danger  @enderror" type="tel" name="phone"
                        value="{{ old('phone') }}" required placeholder="+254712345678/0712345678" />
                </div>

                @error('phone')
                <x-alert type="danger" :message="$message"></x-alert>
                @enderror
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label">{{ __('Password') }}</label>

            <div class="uk-width-1-1">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input class="uk-input @error('password') uk-form-danger  @enderror" type="password" name="password"
                        required autocomplete="new-password" />
                </div>

                @error('password')
                <x-alert type="danger" :message="$message"></x-alert>
                @enderror
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label">{{ __('Confirm Password') }}</label>

            <div class="uk-width-1-1">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: check"></span>
                    <input class="uk-input @error('password_confirmation') uk-form-danger  @enderror" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                @error('password_confirmation')
                <x-alert type="danger" :message="$message"></x-alert>
                @enderror
            </div>
        </div>


        <div class="uk-margin uk-text-center">
            <x-auth-button>
                {{ __('Register') }}
            </x-auth-button>
        </div>
    </form>

    <div class="uk-margin-medium-top uk-margin-remove-bottom uk-text-center">
        <div class="uk-text-meta">
            <span>{{ __('Already familiar?')}}</span>
            <a href="{{ route('login') }}" class="uk-text-primary uk-link-text">
                <small class="uk-text-small">{{ __('Sign in here.') }}</small>
            </a>
        </div>
    </div>
</x-auth-layout>
