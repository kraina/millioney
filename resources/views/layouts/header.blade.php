    <!-- Header -->

    <header class="header">

        <!-- Header Bar -->
        <div class="header_bar d-flex flex-row align-items-center justify-content-start">
            <div class="header_list">
                <ul class="d-flex flex-row align-items-center justify-content-start">
                    <!-- Phone -->
                    <li class="d-flex flex-row align-items-center justify-content-start">
                        <div><img src="{{asset('images/phone-call.svg')}}" alt=""></div>
                        <span>+546 990221 123</span>
                    </li>
                    <!-- Address -->
                    <li class="d-flex flex-row align-items-center justify-content-start">
                        <div><img src="{{asset('images/placeholder.svg')}}" alt=""></div>
                        <span>Main Str, no 23, New York</span>
                    </li>
                    <!-- Email -->
                    <li class="d-flex flex-row align-items-center justify-content-start">
                        <div><img src="{{asset('images/envelope.svg')}}" alt=""></div>
                        <span>hosting@contact.com</span>
                    </li>
                </ul>
            </div>
            <div class="ml-auto d-flex flex-row align-items-center justify-content-start">
                <div class="social">
                    <ul class="d-flex flex-row align-items-center justify-content-start">
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li class="nav-item active">
                                        <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['header']  }}
                                        </a>
                                    </li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
                <div class="log_reg d-flex flex-row align-items-center justify-content-start">
                    <ul class="d-flex flex-row align-items-start justify-content-start">
                        <!-- Authentication Links -->
                        @guest
                            <li>
                                <a href="{{ \LaravelLocalization::localizeURL(route('login')) }}">@lang('auth.login')</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ \LaravelLocalization::localizeURL(route('register')) }}">@lang('auth.register')</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ \LaravelLocalization::localizeURL(route('home.index')) }}">
                                        @lang('auth.my_account')
                                    </a>
                                    <a class="dropdown-item" href="{{ \LaravelLocalization::localizeURL(route('logout')) }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        @lang('auth.logout')
                                    </a>

                                    <form id="logout-form" action="{{ \LaravelLocalization::localizeURL(route('logout')) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>

        <!-- Header Content -->
        <div class="header_content d-flex flex-row align-items-center justify-content-start">
            <div class="logo"><a href="{{LaravelLocalization::localizeURL(route('index'))}}">my<span>home</span></a></div>
            <nav class="main_nav">
                <ul class="d-flex flex-row align-items-start justify-content-start">
                    <li class="{{ Request::path() === LaravelLocalization::localizeURL('/') ? 'active' : ''}}"><a href="{{LaravelLocalization::localizeURL(route('index'))}}">@lang('menu.home')</a></li>
                    <li class="{{ Request::path() === LaravelLocalization::localizeURL('about') ? 'active' : ''}}"><a href="{{LaravelLocalization::localizeURL(route('about'))}}">@lang('menu.about_us')</a></li>
                    <li class="{{ Request::path() === LaravelLocalization::localizeURL('listings') ? 'active' : ''}}"><a href="{{LaravelLocalization::localizeURL(route('listings'))}}">@lang('menu.listings')</a></li>
                    <li class="{{ Request::path() === LaravelLocalization::localizeURL('blog') ? 'active' : ''}}"><a href="{{LaravelLocalization::localizeURL(route('blog'))}}">@lang('menu.news')</a></li>
                    <li class="{{ Request::path() === LaravelLocalization::localizeURL('contact') ? 'active' : ''}}"><a href="{{LaravelLocalization::localizeURL(route('contact'))}}">@lang('menu.contact')</a></li>
                </ul>
            </nav>
            <div class="submit ml-auto"><a href="{{LaravelLocalization::localizeURL(route('listings'))}}">@lang('menu.submit_listing')</a></div>
            <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
        </div>

    </header>

    <!-- Menu -->

    <div class="menu text-right">
        <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="menu_log_reg">
            <div class="log_reg d-flex flex-row align-items-center justify-content-end">
                <ul class="d-flex flex-row align-items-start justify-content-start">
                    <!-- Authentication Links -->
                    @guest
                        <li>
                            <a href="{{ \LaravelLocalization::localizeURL(route('login')) }}">@lang('auth.login')</a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ \LaravelLocalization::localizeURL(route('register')) }}">@lang('auth.register')</a>
                            </li>
                        @endif
                    @else
                            <li>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ \LaravelLocalization::localizeURL(route('home.index')) }}">
                                        @lang('auth.my_account')
                                    </a>
                                    <a class="dropdown-item" href="{{ \LaravelLocalization::localizeURL(route('logout')) }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        @lang('auth.logout')
                                    </a>

                                    <form id="logout-form" action="{{ \LaravelLocalization::localizeURL(route('logout')) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </ul>
            </div>
            <nav class="menu_nav">
                <ul>
                    <li><a href="{{\LaravelLocalization::localizeURL(route('index'))}}">Home</a></li>
                    <li><a href="{{\LaravelLocalization::localizeURL(route('about'))}}">About us</a></li>
                    <li><a href="{{\LaravelLocalization::localizeURL(route('listings'))}}">Listings</a></li>
                    <li><a href="{{\LaravelLocalization::localizeURL(route('blog'))}}">News</a></li>
                    <li><a href="{{\LaravelLocalization::localizeURL(route('contact'))}}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!--./Header -->
