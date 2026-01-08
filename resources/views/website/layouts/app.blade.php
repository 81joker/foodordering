<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta_description', 'Food Ordering HTML Template')" />
    <meta name="keywords" content="@yield('meta_keywords', 'food, ordering, template, restaurant')" />
    <title>@yield('title', 'Food Ordering HTML Template')</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
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

        <header class="stick">
            <div class="topbar">
                <div class="container">
                    <div class="social1">
                        <a href="#" title="Facebook" itemprop="url" target="_blank"><i
                                class="fa fa-facebook-square"></i></a>
                        <a href="#" title="Twitter" itemprop="url" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                        <a href="#" title="Google Plus" itemprop="url" target="_blank"><i
                                class="fa fa-google-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="logo-menu-sec">
                <div class="container">
                    <div class="logo">
                        <h1 itemprop="headline"><a href="{{ url('/') }}" title="Home" itemprop="url"><img
                                    src="{{ asset('frontend/assets/images/logo2.png') }}" alt="logo.png"
                                    itemprop="image"></a></h1>
                    </div>
                    <nav>
                        <div class="menu-sec">
                            <ul>
                                <li><a href="{{ route('home') }}" title="HOME" itemprop="url">HOMEPAGES</a></li>
                                <li><a href="{{ route('restaurant.index') }}" title="RESTAURANTS"
                                        itemprop="url">RESTAURANTS</a></li>
                                <li><a href="{{ route('food.index') }}" title="FOODS" itemprop="url">FOODS</a></li>
                                <li><a href="{{ route('checkout.index') }}" title="CHECKOUT"
                                        itemprop="url">CHECKOUT</a></li>
                                <li><a href="{{ route('contact.index') }}" title="CONTACT" itemprop="url">CONTACT
                                        US</a></li>
                            </ul>
                            <a class="red-bg brd-rd4" href="{{ url('/register-reservation') }}" title="Register"
                                itemprop="url">REGISTER RESTAURANT</a>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <div class="responsive-header">
            <div class="responsive-logomenu">
                <div class="logo">
                    <h1 itemprop="headline"><a href="{{ route('home') }}" title="Home" itemprop="url"><img
                                src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo.png"
                                itemprop="image"></a></h1>
                </div>
                <span class="menu-btn yellow-bg brd-rd4"><i class="fa fa-align-justify"></i></span>
            </div>
            <div class="responsive-menu">
                <span class="menu-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
                <div class="menu-lst">
                    <ul>
                        <li><a href="{{ route('home') }}" title="HOME" itemprop="url">HOMEPAGES</a></li>
                        <li><a href="{{ route('restaurant.index') }}" title="RESTAURANTS"
                                itemprop="url">RESTAURANTS</a></li>
                        <li><a href="{{ route('food.index') }}" title="FOODS" itemprop="url">FOODS</a></li>
                        <li><a href="{{ route('checkout.index') }}" title="CHECKOUT" itemprop="url">CHECKOUT</a>
                        </li>
                        <li><a href="{{ route('contact.index') }}" title="CONTACT" itemprop="url">CONTACT US</a>
                        </li>
                    </ul>
                </div>
                <div class="social1">
                    <a href="#" title="Facebook" itemprop="url" target="_blank"><i
                            class="fa fa-facebook-square"></i></a>
                    <a href="#" title="Twitter" itemprop="url" target="_blank"><i
                            class="fa fa-twitter"></i></a>
                    <a href="#" title="Google Plus" itemprop="url" target="_blank"><i
                            class="fa fa-google-plus"></i></a>
                </div>
                <div class="register-btn">
                    <a class="yellow-bg brd-rd4" href="{{ url('/register-reservation') }}" title="Register"
                        itemprop="url">REGISTER RESTAURANT</a>
                </div>
            </div>
        </div>
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
                                                <a class="brd-rd50" href="#" title="Google Plus"
                                                    itemprop="url" target="_blank"><i
                                                        class="fa fa-google-plus"></i></a>
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
                    <div class="popup-social text-center">
                        <a class="facebook brd-rd3" href="#" title="Facebook" itemprop="url"
                            target="_blank"><i class="fa fa-facebook"></i> Facebook</a>
                        <a class="google brd-rd3" href="#" title="Google Plus" itemprop="url"
                            target="_blank"><i class="fa fa-google-plus"></i> Google</a>
                        <a class="twitter brd-rd3" href="#" title="Twitter" itemprop="url" target="_blank"><i
                                class="fa fa-twitter"></i> Twitter</a>
                    </div>
                    <span class="popup-seprator text-center"><i class="brd-rd50">or</i></span>
                    <form class="sign-form">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" type="text" placeholder="Username or Email">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" type="password" placeholder="Password">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <button class="red-bg brd-rd3" type="submit">SIGN IN</button>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <a class="sign-btn" href="#" title="" itemprop="url">Not a member? Sign
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
                    <div class="popup-social text-center">
                        <a class="facebook brd-rd3" href="#" title="Facebook" itemprop="url"
                            target="_blank"><i class="fa fa-facebook"></i> Facebook</a>
                        <a class="google brd-rd3" href="#" title="Google Plus" itemprop="url"
                            target="_blank"><i class="fa fa-google-plus"></i> Google</a>
                        <a class="twitter brd-rd3" href="#" title="Twitter" itemprop="url" target="_blank"><i
                                class="fa fa-twitter"></i> Twitter</a>
                    </div>
                    <span class="popup-seprator text-center"><i class="brd-rd50">or</i></span>
                    <form class="sign-form">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" type="text" placeholder="Username">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" type="email" placeholder="Email">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" type="password" placeholder="Password">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <button class="red-bg brd-rd3" type="submit">REGISTER NOW</button>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <a class="sign-btn" href="#" title="" itemprop="url">Already Registered?
                                    Sign in</a>
                                <a class="recover-btn" href="#" title="" itemprop="url">Recover my
                                    password</a>
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
