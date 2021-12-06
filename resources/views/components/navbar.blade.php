
<header uk-sticky="sel-target: .uk-navbar-container;animation: uk-animation-slide-top;show-on-up: true">
    <div class="uk-navbar-container">
        <div class="uk-container uk-container-expand">
            <nav uk-navbar="align: left; boundary: .uk-navbar-container">
                <div class="uk-navbar-left">
                    <div class="uk-navbar-item">
                        <a uk-navbar-toggle-icon href="#mobile-nav" uk-toggle="target: #mobile-nav"
                            class="uk-navbar-toggle uk-hidden@m uk-icon uk-navbar-toggle-icon" aria-expanded="false">
                            </a>
                    </div>
                    <ul class="uk-navbar-nav uk-visible@m">
                        <li><a href="/">Home</a></li>
                        <li>
                            <a href="#">Categories</a>
                            <div class="uk-navbar-dropdown">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    @foreach ($categories as $category)
                                    <li>
                                        <a
                                            href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{ route('product.index') }}">Shop</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="uk-navbar-center">
                    <a class="uk-navbar-item uk-logo uk-icon uk-preserve" href="/" uk-icon="icon: logo"></a>
                </div>
                <div class="nav-overlay uk-navbar-right">
                    <ul class="uk-navbar-nav ">
                        <li class="uk-visible@m">
                            <a href="#" class="uk-text-primary">
                                <span class="uk-icon uk-margin-small-right uk-text-lowercase" uk-icon="icon: mail"></span>
                                info@example.com
                            </a>
                        </li>
                        <li class="uk-visible@m">
                            <a href="#" class="uk-text-primary">
                                <span class="uk-icon uk-margin-small-right" uk-icon="icon: phone"></span>
                                +254711258741
                            </a>
                        </li>
                        @guest
                            <li class="{{ request()->routeIs('login') ? 'uk-active' : '' }} uk-visible@m">

                                <a href="{{ route('login') }}" class="uk-icon" uk-icon="icon: sign-in"
                                    uk-tooltip="title: Login">
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="{{ request()->routeIs('register') ? 'uk-active' : '' }} uk-visible@m">
                                    <a href="{{ route('register') }}" class="uk-icon" uk-icon="icon: register"
                                        uk-tooltip="title: Register">
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="uk-visible@m">
                                <a href="#">
                                    <span class="uk-icon" uk-icon="icon: account-circle"></span>
                                </a>
                                <div class="uk-navbar-dropdown uk-width-medium uk-navbar-dropdown-bottom-right">
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li class="uk-nav-header">
                                            Hi, {{ Auth::user()->name }}
                                        </li>
                                        <li class="uk-nav-divider"></li>

                                        <li class="{{ request()->routeIs('dashboard') ? 'uk-active' : '' }}">
                                            <a href="{{ route('dashboard') }}">
                                                <span class="uk-icon uk-margin-small-right" uk-icon="icon: dashboard"></span>
                                                Dashboard
                                            </a>
                                        </li>

                                        <li>
                                            <a href="/user/profile">
                                                <span uk-icon="settings" class="uk-margin-small-right"></span>
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
                                    </ul>
                                </div>
                            </li>

                        @endguest
                        <li>
                          <livewire:bag />
                        </li>

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

                    <a class="uk-navbar-toggle" uk-close uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"></a>
                </div>
            </nav>
        </div>
    </div>
</header>


{{-- offcanvas menu for mobile --}}
<aside id="mobile-nav" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
            <li><a href="/">Home</a></li>
            <li class="uk-parent">
                <a href="#">Categories</a>
                <ul class="uk-nav-sub">
                   @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{ route('product.index') }}">Shop</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li class="uk-nav-divider"></li>
            @guest
                <li>
                    <nav class="uk-navbar">
                        <div class="uk-navbar-center">
                            <ul class="uk-navbar-nav">
                                <li class="{{ request()->routeIs('login') ? 'uk-active' : '' }}">
                                    <a href="{{ route('login') }}" class="uk-icon" uk-icon="icon: sign-in" uk-tooltip="title: Login">
                                    </a>
                                </li>
                                @if (Route::has('register'))
                                <li class="{{ request()->routeIs('register') ? 'uk-active' : '' }}">
                                    <a href="{{ route('register') }}" class="uk-icon" uk-icon="icon: register" uk-tooltip="title: Register">
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </li>

            @else
           <li class="uk-nav-header">
                Hi, {{ Auth::user()->name }}
            </li>
            <li>
                <nav class="uk-navbar">
                    <div class="uk-navbar-center">
                        <ul class="uk-navbar-nav">
                            <li class="{{ request()->routeIs('dashboard') ? 'uk-active' : '' }}">
                                <a href="{{ route('dashboard') }}" uk-tooltip="Dashboard">
                                    <span class="uk-icon uk-margin-small-right" uk-icon="icon: dashboard"></span>
                                </a>
                            </li>

                            <li>
                                <a href="/user/profile" uk-tooltip="Profile">
                                    <span uk-icon="settings" class="uk-margin-small-right"></span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" uk-tooltip="Log out">
                                    <span uk-icon="sign-out" class="uk-margin-small-right"></span>

                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" uk-hidden>
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </li>
            @endguest
            {{-- <li class="uk-nav-divider"></li> --}}
            {{-- <li>
                <a href="#" class="uk-icon" uk-icon="icon: bag" uk-tooltip="title: Cart"> </a>
            </li>
            <li>
                <a href="#" class="uk-icon" uk-icon="icon: search" uk-tooltip="title: Cart"> </a>
            </li> --}}
        </ul>
    </div>
</aside>
