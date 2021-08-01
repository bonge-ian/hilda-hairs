{{-- <nav class="uk-background-default uk-box-shadow-small" uk-navbar>
	<div class="uk-navbar-left">
		<a class="uk-navbar-item uk-logo" href="#">
			<img data-src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" uk-svg uk-img width="40" height="40">
		</a>

		<ul class="uk-navbar-nav">
			@auth
				<li class="{{ request()->routeIs('dashboard') ? 'uk-active' : '' }}">
					<a href="{{ route('dashboard') }}">Dashboard</a>
				</li>
			@endauth
		</ul>
	</div>

	<div class="uk-navbar-right">
		<ul class="uk-navbar-nav">
			<li>
				<a href="#"><span uk-icon="grid"></span></a>
				<div class="uk-navbar-dropdown uk-width-medium">
					<ul class="uk-nav uk-navbar-dropdown-nav">
						<!-- Authentication Links -->
						@guest
							<li class="{{ request()->routeIs('login') ? 'uk-active' : '' }}">
								<a href="{{ route('login') }}">
									<span uk-icon="sign-in" class="uk-margin-small-right"></span>
									{{ __('Login') }}
								</a>
							</li>

						@if (Route::has('register'))
							<li class="{{ request()->routeIs('register') ? 'uk-active' : '' }}">
								<a href="{{ route('register') }}">
									<span uk-icon="user" class="uk-margin-small-right"></span>
									{{ __('Register') }}
								</a>
							</li>
						@endif
						@else
							<li class="uk-nav-header">
								Hi, {{ Auth::user()->name }}
							</li>

							<li class="uk-nav-divider"></li>

							<li>
								<a href="/user/profile">
									<span uk-icon="user" class="uk-margin-small-right"></span>
									Profile
								</a>
							</li>

							<li>
								<a href="{{ route('logout') }}"
									onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<span uk-icon="sign-out" class="uk-margin-small-right"></span>
									Logout
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" uk-hidden>
									@csrf
								</form>
							</li>
						@endguest
					</ul>
				</div>
			</li>
		</ul>
	</div>
</nav> --}}

<header uk-sticky="sel-target: .uk-navbar-container;animation: uk-animation-slide-top;show-on-up: true">
	<div class="uk-navbar-container">
		<div class="uk-container uk-container-expand">
			<nav uk-navbar="align: left;boundary: .uk-navbar-container;">
				<div class="uk-navbar-left">
					<ul class="uk-navbar-nav">
						<li><a href="index.html">Home</a></li>
						<li>
							<a href="#">Shop</a>
							<div class="uk-navbar-dropdown">
								<ul class="uk-nav uk-navbar-dropdown-nav">
									<li><a href="#">Wigs</a></li>
									<li><a href="#">Weaves</a></li>
									<li><a href="#">Hair Extensions</a></li>
								</ul>
							</div>
						</li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>
				<div class="uk-navbar-center">
					<a class="uk-navbar-item uk-logo uk-icon uk-preserve" href="#" uk-icon="icon: logo"></a>
				</div>
				<div class="nav-overlay uk-navbar-right">
					<ul class="uk-navbar-nav">
						<li>
							<a href="#" class="uk-text-primary">
								<span class="uk-icon uk-margin-small-right" uk-icon="icon: mail"></span>
								info@example.com
							</a>
						</li>
						<li>
							<a href="#" class="uk-text-primary">
								<span class="uk-icon uk-margin-small-right" uk-icon="icon: phone"></span>
								+254711258741
							</a>
						</li>
						@guest

						<li class="{{ request()->routeIs('login') ? 'uk-active' : '' }}">

							<a href="{{ route('login') }}" class="uk-icon" uk-icon="icon: sign-in" uk-tooltip="title: Login">
								{{-- <span uk-icon="sign-in" class="uk-margin-small-right "></span>
								{{ __('Login') }} --}}
							</a>
						</li>

						@if (Route::has('register'))
						<li class="{{ request()->routeIs('register') ? 'uk-active' : '' }}">
							<a href="{{ route('register') }}" class="uk-icon" uk-icon="icon: register" uk-tooltip="title: Register">
								{{-- <span uk-icon="user" class="uk-margin-small-right "></span>
								{{ __('Register') }} --}}
							</a>
						</li>
						@endif
						@else
						<li class="uk-nav-header">
							Hi, {{ Auth::user()->name }}
						</li>

						<li class="uk-nav-divider"></li>

						<li>
							<a href="/user/profile">
								<span uk-icon="user" class="uk-margin-small-right"></span>
								Profile
							</a>
						</li>

						<li>
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<span uk-icon="sign-out" class="uk-margin-small-right"></span>
								Logout
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" uk-hidden>
								@csrf
							</form>
						</li>
						@endguest
						<li>
							<a href="#" class="uk-icon" uk-icon="icon: bag" uk-tooltip="title: Cart"> </a>
						</li>
						@auth
						<li class="{{ request()->routeIs('dashboard') ? 'uk-active' : '' }}">
							<a href="{{ route('dashboard') }}">Dashboard</a>
						</li>
						@endauth
					</ul>
					<a class="uk-navbar-toggle" uk-search-icon
						uk-toggle="target: .nav-overlay; animation: uk-animation-fade" uk-tooltip="title: Search"
						href="#"></a>
				</div>
				<div class="nav-overlay uk-navbar-right" hidden>
					<div class="uk-navbar-item uk-width-expand">
						<form class="uk-search uk-search-navbar uk-width-1-1">
							<input class="uk-search-input" type="search" placeholder="Search" autofocus />
						</form>
					</div>

					<a class="uk-navbar-toggle" uk-close uk-toggle="target: .nav-overlay; animation: uk-animation-fade"
						href="#"></a>
				</div>
			</nav>
		</div>
	</div>
</header>
