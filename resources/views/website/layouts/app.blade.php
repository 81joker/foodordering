<!DOCTYPE html>
<html lang="en"
    @if (request()->query('register') || $errors->has('name')) class="sign-popup-active" @elseif($errors->has('email') || $errors->has('password') || request()->query('login')) class="log-popup-active" @endif>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta_description', 'Food Ordering HTML Template')" />
    <meta name="keywords" content="@yield('meta_keywords', 'food, ordering, template, restaurant')" />
    <title>@yield('title', 'Food Ordering HTML Template')</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/red-color.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/yellow-color.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    @yield('styles')
</head>

<body itemscope>
    <main>
        <div class="preloader">
            <div id="cooking">
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div id="area">
                    <div id="sides">
                        <div id="pan"></div>
                        <div id="handle"></div>
                    </div>
                    <div id="pancake">
                        <div id="pastry"></div>
                    </div>
                </div>
            </div>
        </div>

        @include('website.layouts.navbar')
        @if (!request()->routeIs('home'))
            @include('website.layouts.hero', ['title' => trim($__env->yieldContent('title'))])
        @endif
        {{-- @yield('hero') --}}
        @yield('content')
        <footer>
            <div class="block top-padd80 bottom-padd80 dark-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="footer-data">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-lg-3">
                                        <div class="widget about_widget wow fadeIn" data-wow-delay="0.1s">
                                            <div class="logo">
                                                <h1 itemprop="headline"><a href="{{ url('/') }}" title="Home"
                                                        itemprop="url"><img
                                                            src="{{ asset('frontend/assets/images/logo.png') }}"
                                                            alt="logo.png" itemprop="image"></a></h1>
                                            </div>
                                            <p itemprop="description">Food Ordering is a Premium HTML Template. Best
                                                choice for your online store. Let purchase it to enjoy now</p>
                                            <div class="social2">
                                                <a class="brd-rd50" href="#" title="Facebook" itemprop="url"
                                                    target="_blank"><i class="fa fa-facebook"></i></a>
                                                <a class="brd-rd50" href="#" title="Google Plus" itemprop="url"
                                                    target="_blank"><i class="fa fa-google-plus"></i></a>
                                                <a class="brd-rd50" href="#" title="Twitter" itemprop="url"
                                                    target="_blank"><i class="fa fa-twitter"></i></a>
                                                <a class="brd-rd50" href="#" title="Pinterest" itemprop="url"
                                                    target="_blank"><i class="fa fa-pinterest"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-lg-3">
                                        <div class="widget information_links wow fadeIn" data-wow-delay="0.2s">
                                            <h4 class="widget-title" itemprop="headline">INFORMATION</h4>
                                            <ul>
                                                <li><a href="#" title="" itemprop="url">Careers</a></li>
                                                <li><a href="#" title="" itemprop="url">Investor
                                                        Relations</a></li>
                                                <li><a href="#" title="" itemprop="url">Press
                                                        Releases</a></li>
                                                <li><a href="#" title="" itemprop="url">Shop with
                                                        Points</a></li>
                                                <li><a href="#" title="" itemprop="url">More Branches</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-lg-3">
                                        <div class="widget customer_care wow fadeIn" data-wow-delay="0.3s">
                                            <h4 class="widget-title" itemprop="headline">CUSTOMER CARE</h4>
                                            <ul>
                                                <li><a href="#" title="" itemprop="url">Returns</a></li>
                                                <li><a href="#" title="" itemprop="url">Shipping Info</a>
                                                </li>
                                                <li><a href="#" title="" itemprop="url">Gift Cards</a>
                                                </li>
                                                <li><a href="#" title="" itemprop="url">Size Guide</a>
                                                </li>
                                                <li><a href="#" title="" itemprop="url">Money Back</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-lg-3">
                                        <div class="widget get_in_touch wow fadeIn" data-wow-delay="0.4s">
                                            <h4 class="widget-title" itemprop="headline">GET IN TOUCH</h4>
                                            <ul>
                                                <li><i class="fa fa-map-marker"></i> 123 New Design Str, ABC Building,
                                                    melbourne, Australia.</li>
                                                <li><i class="fa fa-phone"></i> (0044) 8647 1234 587</li>
                                                <li><i class="fa fa-envelope"></i> <a href="#" title=""
                                                        itemprop="url">hello@yourdomain.com</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="bottom-bar dark-bg text-center">
            <div class="container">
                <p itemprop="description"><a href="templatespoint.net">Templates Point</a></p>
            </div>
        </div>

        <div class="log-popup text-center">
            <div class="sign-popup-wrapper brd-rd5">
                <div class="sign-popup-inner brd-rd5">
                    <a class="log-close-btn" href="#" title="" itemprop="url"><i
                            class="fa fa-close"></i></a>
                    <div class="sign-popup-title text-center">
                        <h4 itemprop="headline">SIGN IN</h4>
                        <span>with your social network</span>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger text-center small">{{ session('error') }}</div>
                    @endif
                    {{-- Social login: works when deployed online; on localhost redirect URIs may need to match .env --}}
                    <div class="popup-social text-center">
                        <a class="facebook brd-rd3" href="{{ route('auth.facebook') }}" title="Facebook"
                            itemprop="url"><i class="fa fa-facebook"></i> Facebook</a>
                        <a class="google brd-rd3" href="{{ route('auth.google') }}" title="Google"
                            itemprop="url"><i class="fa fa-google-plus"></i> Google</a>
                        <a class="twitter brd-rd3" href="{{ route('auth.github') }}" title="GitHub"
                            itemprop="url"><i class="fa fa-github"></i> GitHub</a>
                    </div>
                    <span class="popup-seprator text-center"><i class="brd-rd50">or</i></span>
                    <form class="sign-form" method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3 z-index-3" type="email" name="email"
                                    value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                                @error('email')
                                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3 z-index-3" type="password" name="password"
                                    placeholder="Password" required autocomplete="current-password">
                                @error('password')
                                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <button class="red-bg brd-rd3 z-index-3" type="submit">SIGN IN</button>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <a class="sign-btn" href="{{ url()->current() }}?register=1" title=""
                                    itemprop="url">Not a member? Sign
                                    up</a>
                                <a class="recover-btn" href="#" title="" itemprop="url">Recover my
                                    password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="sign-popup text-center">
            <div class="sign-popup-wrapper brd-rd5">
                <div class="sign-popup-inner brd-rd5">
                    <a class="sign-close-btn" href="#" title="" itemprop="url"><i
                            class="fa fa-close"></i></a>
                    <div class="sign-popup-title text-center">
                        <h4 itemprop="headline">SIGN UP</h4>
                        <span>with your social network</span>
                    </div>
                    {{-- Social sign up: same as login; works when deployed online --}}
                    <div class="popup-social text-center">
                        <a class="facebook brd-rd3" href="{{ route('auth.facebook') }}" title="Facebook"
                            itemprop="url"><i class="fa fa-facebook"></i> Facebook</a>
                        <a class="google brd-rd3" href="{{ route('auth.google') }}" title="Google"
                            itemprop="url"><i class="fa fa-google-plus"></i> Google</a>
                        <a class="twitter brd-rd3" href="{{ route('auth.github') }}" title="GitHub"
                            itemprop="url"><i class="fa fa-github"></i> GitHub</a>
                    </div>
                    <span class="popup-seprator text-center"><i class="brd-rd50">or</i></span>
                    <form class="sign-form" method="POST" action="{{ route('register.post') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3 z-index-3" type="text" name="name"
                                    value="{{ old('name') }}" placeholder="Name" required autocomplete="name">
                                @error('name')
                                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3 z-index-3" type="email" name="email"
                                    value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                                @error('email')
                                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3 z-index-3" type="password" name="password"
                                    placeholder="Password" required autocomplete="new-password">
                                @error('password')
                                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3 z-index-3" type="password" name="password_confirmation"
                                    placeholder="Confirm Password" required autocomplete="new-password">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <button class="red-bg brd-rd3 z-index-3" type="submit">REGISTER NOW</button>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <a class="sign-btn z-index-3" href="{{ url()->current() }}?login=1" title=""
                                    itemprop="url">Already Registered?
                                    Sign in</a>
                                <a class="recover-btn z-index-3" href="#" title=""
                                    itemprop="url">Recover my password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
</body>

</html>
