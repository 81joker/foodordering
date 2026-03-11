<header class="stick">
    <div class="topbar">
        <div class="container">
            @if (Auth::check())
                <div class="topbar-register">

                    <a href="#">
                        <i class="fa fa-user"></i> {{ Auth::user()->name }}
                    </a>
                    |
                    <a href="#" title="Register" itemprop="url"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @else
                <div class="topbar-register">
                    <a class="log-popup-btn" href="#" title="Login" itemprop="url">LOGIN</a> / <a
                        class="sign-popup-btn" href="#" title="Register" itemprop="url">REGISTER</a>
                </div>
            @endif



            <div class="social1">
                <a href="#" title="Facebook" itemprop="url" target="_blank"><i
                        class="fa fa-facebook-square"></i></a>
                <a href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="#" title="Google Plus" itemprop="url" target="_blank"><i
                        class="fa fa-google-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="logo-menu-sec">
        <div class="container">
            <div class="logo">
                <h1 itemprop="headline"><a href="{{ url('/') }}" title="Home" itemprop="url"><img
                            src="{{ asset('frontend/assets/images/logo2.png') }}" alt="logo.png" itemprop="image"></a>
                </h1>
            </div>
            <nav>
                <div class="menu-sec">
                    {{-- <ul>
                        <li><a href="{{ route('home') }}" title="HOME" itemprop="url">HOMEPAGES</a></li>
                        <li><a href="{{ route('restaurant.index') }}" title="RESTAURANTS" itemprop="url">RESTAURANTS</a>
                        </li>
                        <li><a href="{{ route('food.index') }}" title="FOODS" itemprop="url">FOODS</a></li>
                        <li><a href="{{ route('checkout.index') }}" title="CHECKOUT" itemprop="url">CHECKOUT</a>
                        </li>
                        <li><a href="{{ route('contact.index') }}" title="CONTACT" itemprop="url">CONTACT
                                US</a></li>
                    </ul> --}}
                    <ul>
                        <li class="menu-item-has-children"><a href="{{ route('home') }}" title="HOMEPAGES"
                                itemprop="url"><span class="red-clr">FOOD ORDERING</span>HOMEPAGES</a>
                        </li>
                        <li class="menu-item-has-children"><a href="{{ route('restaurant.index') }}" title="RESTAURANTS"
                                itemprop="url"><span class="red-clr">FOOD ORDERING</span>RESTAURANTS</a>
                        </li>
                        <li class="menu-item-has-children"><a href="{{ route('food.index') }}" title="FOODS"
                                itemprop="url"><span class="red-clr">FOOD ORDERING</span>FOODS</a>
                        </li>
                        <li class="menu-item-has-children"><a href="{{ route('checkout.index') }}" title="CHECKOUT"
                                itemprop="url"><span class="red-clr">FOOD ORDERING</span>CHECKOUT</a>
                        </li>
                        {{-- <li class="menu-item-has-children"><a href="{{ route('contact.index') }}" title="CONTACT"
                                itemprop="url"><span class="red-clr">FOOD ORDERING</span>CONTACT US</a>
                        </li> --}}

                    </ul>
                    <a class="red-bg brd-rd4" href="{{ url('/register-reservation') }}" title="Register"
                        itemprop="url">REGISTER RESTAURANT</a>
                </div>
            </nav>
        </div>
    </div>
</header>
{{-- display on mobile --}}
<div class="responsive-header">
    <div class="responsive-logomenu">
        <div class="logo">
            <h1 itemprop="headline"><a href="{{ route('home') }}" title="Home" itemprop="url"><img
                        src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo.png" itemprop="image"></a>
            </h1>
        </div>
        <span class="menu-btn yellow-bg brd-rd4"><i class="fa fa-align-justify"></i></span>
    </div>
    <div class="responsive-menu">
        <span class="menu-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
        <div class="menu-lst">
            <ul>
                <li><a href="{{ route('home') }}" title="HOME" itemprop="url">HOMEPAGES</a></li>
                <li><a href="{{ route('restaurant.index') }}" title="RESTAURANTS" itemprop="url">RESTAURANTS</a>
                </li>
                <li><a href="{{ route('food.index') }}" title="FOODS" itemprop="url">FOODS</a></li>
                <li><a href="{{ route('checkout.index') }}" title="CHECKOUT" itemprop="url">CHECKOUT</a>
                </li>
                <li><a href="{{ route('contact.index') }}" title="CONTACT" itemprop="url">CONTACT US</a>
                </li>
            </ul>
        </div>
        <div class="topbar-register">
            @if (Auth::check())
                <a href="#">
                    <i class="fa fa-user"></i> {{ Auth::user()->name }}
                </a>
                |
                <a href="#" title="Register" itemprop="url"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a class="log-popup-btn" href="#" title="Login" itemprop="url">LOGIN</a> / <a
                    class="sign-popup-btn" href="#" title="Register" itemprop="url">REGISTER</a>
            @endif
        </div>
        <div class="social1">
            <a href="#" title="Facebook" itemprop="url" target="_blank"><i
                    class="fa fa-facebook-square"></i></a>
            <a href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="#" title="Google Plus" itemprop="url" target="_blank"><i
                    class="fa fa-google-plus"></i></a>
        </div>
        <div class="register-btn">
            <a class="yellow-bg brd-rd4" href="{{ url('/register-reservation') }}" title="Register"
                itemprop="url">REGISTER RESTAURANT</a>
        </div>
    </div>
</div>
