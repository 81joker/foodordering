@extends('website.layouts.app')

@section('content')
    <div class="responsive-header">
        <div class="responsive-topbar">
            <div class="select-wrp">
                <select data-placeholder="Feel Like Eating">
                    <option>FEEL LIKE EATING</option>
                    <option>Burger</option>
                    <option>Pizza</option>
                    <option>Fried Rice</option>
                    <option>Chicken Shots</option>
                </select>
            </div>
            <div class="select-wrp">
                <select data-placeholder="Choose Location">
                    <option>CHOOSE LOCATION</option>
                    <option>New york</option>
                    <option>Washington</option>
                    <option>Chicago</option>
                    <option>Los Angeles</option>
                </select>
            </div>
        </div>
        <div class="responsive-logomenu">
            <div class="logo">
                <h1 itemprop="headline"><a href="index-2.html" title="Home" itemprop="url"><img src="assets/images/logo.png"
                            alt="logo.png" itemprop="image"></a></h1>
            </div>
            <span class="menu-btn yellow-bg brd-rd4"><i class="fa fa-align-justify"></i></span>
        </div>
        <div class="responsive-menu">
            <span class="menu-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
            <div class="menu-lst">
                <ul>
                    <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url"><span
                                class="yellow-clr">FOOD ORDERING</span>HOMEPAGES</a>
                        <ul class="sub-dropdown">
                            <li><a href="index-2.html" title="HOMEPAGE 1" itemprop="url">HOMEPAGE 1</a></li>
                            <li><a href="index2.html" title="HOMEPAGE 2" itemprop="url">HOMEPAGE 2</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#" title="RESTAURANTS" itemprop="url"><span
                                class="yellow-clr">REAL FOOD</span>RESTAURANTS</a>
                        <ul class="sub-dropdown">
                            <li><a href="restaurant-found.html" title="RESTAURANT 1" itemprop="url">RESTAURANT 1</a>
                            </li>
                            <li><a href="restaurant-found2.html" title="RESTAURANT 2" itemprop="url">RESTAURANT 2</a>
                            </li>
                            <li><a href="restaurant-detail.html" title="RESTAURANT DETAILS" itemprop="url">RESTAURANT
                                    DETAILS</a></li>
                            <li><a href="restaurant-detail.html" title="RESTAURANT DETAILS" itemprop="url">RESTAURANT
                                    DETAILS</a></li>
                            <li><a href="food-recipes.html" title="RESTAURANT DETAILS" itemprop="url">FOOD
                                    RECIPES</a></li>
                            <li><a href="our-articles.html" title="RESTAURANT DETAILS" itemprop="url">OUR
                                    ARTICLES</a></li>
                            <li><a href="our-menu.html" title="RESTAURANT DETAILS" itemprop="url">OUR MENU</a></li>
                            <li><a href="our-services.html" title="RESTAURANT DETAILS" itemprop="url">OUR
                                    SERVICES</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#" title="PAGES" itemprop="url"><span
                                class="yellow-clr">REAL FOOD</span>PAGES</a>
                        <ul class="sub-dropdown">
                            <li class="menu-item-has-children"><a href="#" title="BLOG" itemprop="url">BLOG</a>
                                <ul class="sub-dropdown">
                                    <li class="menu-item-has-children"><a href="#" title="BLOG LAYOUTS"
                                            itemprop="url">BLOG LAYOUTS</a>
                                        <ul class="sub-dropdown">
                                            <li><a href="blog-right-sidebar.html" title="BLOG WITH RIGHT SIDEBAR"
                                                    itemprop="url">BLOG (W.R.S)</a></li>
                                            <li><a href="blog-left-sidebar.html" title="BLOG WITH LEFT SIDEBAR"
                                                    itemprop="url">BLOG (W.L.S)</a></li>
                                            <li><a href="blog.html" title="BLOG WITH NO SIDEBAR" itemprop="url">BLOG</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#" title="BLOG DETAIL"
                                            itemprop="url">BLOG DETAIL</a>
                                        <ul class="sub-dropdown">
                                            <li><a href="blog-detail-right-sidebar.html"
                                                    title="BLOG DETAIL WITH RIGHT SIDEBAR" itemprop="url">BLOG DETAIL
                                                    (W.R.S)</a></li>
                                            <li><a href="blog-detail-left-sidebar.html"
                                                    title="BLOG DETAIL WITH LEFT SIDEBAR" itemprop="url">BLOG DETAIL
                                                    (W.L.S)</a></li>
                                            <li><a href="blog-detail.html" title="BLOG DETAIL WITH NO SIDEBAR"
                                                    itemprop="url">BLOG DETAIL</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#" title="BLOG FORMATES"
                                            itemprop="url">BLOG FORMATES</a>
                                        <ul class="sub-dropdown">
                                            <li><a href="blog-detail-video.html" title="BLOG DETAIL WITH VIDEO"
                                                    itemprop="url">BLOG DETAIL (VIDEO)</a></li>
                                            <li><a href="blog-detail-audio.html" title="BLOG DETAIL WITH AUDIO"
                                                    itemprop="url">BLOG DETAIL (AUDIO)</a></li>
                                            <li><a href="blog-detail-carousel.html" title="BLOG DETAIL WITH CAROUSEL"
                                                    itemprop="url">BLOG DETAIL (CAROUSEL)</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#" title="SPECIAL PAGES"
                                    itemprop="url">SPECIAL PAGES</a>
                                <ul class="sub-dropdown">
                                    <li><a href="404.html" title="404 ERROR" itemprop="url">404 ERROR</a></li>
                                    <li><a href="search-found.html" title="SEARCH FOUND" itemprop="url">SEARCH
                                            FOUND</a></li>
                                    <li><a href="search-not-found.html" title="SEARCH NOT FOUND" itemprop="url">SEARCH
                                            NOT FOUND</a></li>
                                    <li><a href="coming-soon.html" title="COMING SOON" itemprop="url">COMING SOON</a>
                                    </li>
                                    <li><a href="login-register.html" title="LOGIN & REGISTER" itemprop="url">LOGIN &
                                            REGISTER</a></li>
                                    <li><a href="price-table.html" title="PRICE TABLE" itemprop="url">PRICE TABLE</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#" title="GALLERY"
                                    itemprop="url">GALLERY</a>
                                <ul class="sub-dropdown">
                                    <li><a href="gallery.html" title="FOOD GALLERY" itemprop="url">FOOD GALLERY</a>
                                    </li>
                                    <li><a href="gallery-detail.html" title="GALLERY DETAIL" itemprop="url">GALLERY
                                            DETAIL</a></li>
                                </ul>
                            </li>
                            <li><a href="register-reservation.html" title="REGISTER RESERVATION" itemprop="url">REGISTER
                                    RESERVATION</a></li>
                            <li><a href="how-it-works.html" title="HOW IT WORKS" itemprop="url">HOW IT WORKS</a></li>
                            <li><a href="dashboard.html" title="USER PROFILE" itemprop="url">USER PROFILE</a></li>
                            <li><a href="about-us.html" title="ABOUT US" itemprop="url">ABOUT US</a></li>
                            <li><a href="food-detail.html" title="FOOD DETAIL" itemprop="url">FOOD DETAIL</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html" title="CONTACT US" itemprop="url"><span class="yellow-clr">REAL
                                FOOD</span>CONTACT US</a></li>
                </ul>
            </div>
            <div class="topbar-register">
                <a class="log-popup-btn" href="#" title="Login" itemprop="url">LOGIN</a> / <a
                    class="sign-popup-btn" href="#" title="Register" itemprop="url">REGISTER</a>
            </div>
            <div class="social1">
                <a href="#" title="Facebook" itemprop="url" target="_blank"><i
                        class="fa fa-facebook-square"></i></a>
                <a href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="#" title="Google Plus" itemprop="url" target="_blank"><i
                        class="fa fa-google-plus"></i></a>
            </div>
            <div class="register-btn">
                <a class="yellow-bg brd-rd4" href="register-reservation.html" title="Register" itemprop="url">REGISTER
                    RESTAURANT</a>
            </div>
        </div><!-- Responsive Menu -->
    </div><!-- Responsive Header -->

    <section>
        <div class="block">
            <div class="fixed-bg" style="background-image: url(assets/images/topbg.jpg);"></div>
            <div class="page-title-wrapper text-center">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="page-title-inner">
                        <h1 itemprop="headline">Search Found</h1>
                        <span>A Greate Restaurant Website</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Search</a></li>
                <li class="breadcrumb-item active">Search Found</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block top-padd30 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sec-box">
                            <div class="col-md-9 col-sm-12 col-lg-9">
                                <div class="search-found">
                                    <h3 itemprop="headline">Search Result Found <span class="red-clr">"Food"</span>
                                    </h3>
                                    <p itemprop="description">Vivam pulput vehic Mauris porttitor erovel sapien Sed ut
                                        persp voluptatem accusanti...</p>
                                    <form class="search-frm">
                                        <input type="text" placeholder="Search Keyword">
                                        <button class="red-bg" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="remove-ext">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <div class="news-box wow fadeIn" data-wow-delay="0.2s">
                                                <div class="news-thumb">
                                                    <a class="brd-rd2" href="blog-detail-right-sidebar.html"
                                                        title="" itemprop="url"><img
                                                            src="assets/images/resource/news-img3-1.jpg"
                                                            alt="news-img3-1.jpg" itemprop="image"></a>
                                                    <div class="news-btns">
                                                        <a class="post-date red-bg" href="#" title=""
                                                            itemprop="url">JUNE 14</a>
                                                        <a class="read-more" href="blog-detail-right-sidebar.html"
                                                            itemprop="url">READ MORE</a>
                                                    </div>
                                                </div>
                                                <div class="news-info">
                                                    <h4 itemprop="headline"><a href="blog-detail-right-sidebar.html"
                                                            title="" itemprop="url">Floury Bakery is The Best
                                                            Choice</a></h4>
                                                    <p itemprop="description">The only thing bad about the place was
                                                        the time they .took to provide us with our food</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <div class="news-box wow fadeIn" data-wow-delay="0.3s">
                                                <div class="news-thumb">
                                                    <a class="brd-rd2" href="blog-detail-left-sidebar.html"
                                                        title="" itemprop="url"><img
                                                            src="assets/images/resource/news-img3-2.jpg"
                                                            alt="news-img3-2.jpg" itemprop="image"></a>
                                                    <div class="news-btns">
                                                        <a class="post-date red-bg" href="#" title=""
                                                            itemprop="url">AUGUST 14</a>
                                                        <a class="read-more" href="blog-detail-left-sidebar.html"
                                                            itemprop="url">READ MORE</a>
                                                    </div>
                                                </div>
                                                <div class="news-info">
                                                    <h4 itemprop="headline"><a href="blog-detail-left-sidebar.html"
                                                            title="" itemprop="url">Tried Their Amazing Grilled
                                                            Ham</a></h4>
                                                    <p itemprop="description">The only thing bad about the place was
                                                        the time they .took to provide us with our food</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <div class="news-box wow fadeIn" data-wow-delay="0.3s">
                                                <div class="news-thumb">
                                                    <a class="brd-rd2" href="blog-detail.html" title=""
                                                        itemprop="url"><img src="assets/images/resource/news-img3-3.jpg"
                                                            alt="news-img3-3.jpg" itemprop="image"></a>
                                                    <div class="news-btns">
                                                        <a class="post-date red-bg" href="#" title=""
                                                            itemprop="url">APRIL 14</a>
                                                        <a class="read-more" href="blog-detail.html" itemprop="url">READ
                                                            MORE</a>
                                                    </div>
                                                </div>
                                                <div class="news-info">
                                                    <h4 itemprop="headline"><a href="blog-detail.html" title=""
                                                            itemprop="url">Best Choice For Our Daily Healthy Meal</a>
                                                    </h4>
                                                    <p itemprop="description">The only thing bad about the place was
                                                        the time they .took to provide us with our food</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <div class="news-box wow fadeIn" data-wow-delay="0.4s">
                                                <div class="news-thumb">
                                                    <a class="brd-rd2" href="blog-detail-left-sidebar.html"
                                                        title="" itemprop="url"><img
                                                            src="assets/images/resource/news-img3-4.jpg"
                                                            alt="news-img3-4.jpg" itemprop="image"></a>
                                                    <div class="news-btns">
                                                        <a class="post-date red-bg" href="#" title=""
                                                            itemprop="url">JULY 20</a>
                                                        <a class="read-more" href="blog-detail-left-sidebar.html"
                                                            itemprop="url">READ MORE</a>
                                                    </div>
                                                </div>
                                                <div class="news-info">
                                                    <h4 itemprop="headline"><a href="blog-detail-left-sidebar.html"
                                                            title="" itemprop="url">Easy Homemade Shahi Tukda
                                                            Recipe</a></h4>
                                                    <p itemprop="description">The only thing bad about the place was
                                                        the time they .took to provide us with our food</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-lg-3">
                                <div class="sidebar right">
                                    <div class="widget style2 popular_posts wow fadeIn" data-wow-delay="0.2s">
                                        <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Popular Posts</h4>
                                        <div class="widget-data">
                                            <div class="mini-posts-list">
                                                <div class="mini-post-item">
                                                    <a href="blog-detail-right-sidebar.html" title=""
                                                        itemprop="url"><img class="brd-rd2"
                                                            src="assets/images/resource/popular-post-img1.jpg"
                                                            alt="popular-post-img1.jpg" itemprop="image"></a>
                                                    <div class="mini-post-info">
                                                        <h5 itemprop="headline"><a href="blog-detail-right-sidebar.html"
                                                                title="" itemprop="url">Food Tech</a></h5>
                                                        <span class="mini-post-data"><i class="fa fa-clock-o"></i>
                                                            August 10, 2017</span>
                                                    </div>
                                                </div>
                                                <div class="mini-post-item">
                                                    <a href="blog-detail-left-sidebar.html" title=""
                                                        itemprop="url"><img class="brd-rd2"
                                                            src="assets/images/resource/popular-post-img2.jpg"
                                                            alt="popular-post-img2.jpg" itemprop="image"></a>
                                                    <div class="mini-post-info">
                                                        <h5 itemprop="headline"><a href="blog-detail-left-sidebar.html"
                                                                title="" itemprop="url">Food Tech</a></h5>
                                                        <span class="mini-post-data"><i class="fa fa-clock-o"></i>
                                                            November 12, 2017</span>
                                                    </div>
                                                </div>
                                                <div class="mini-post-item">
                                                    <a href="blog-detail.html" title="" itemprop="url"><img
                                                            class="brd-rd2"
                                                            src="assets/images/resource/popular-post-img3.jpg"
                                                            alt="popular-post-img3.jpg" itemprop="image"></a>
                                                    <div class="mini-post-info">
                                                        <h5 itemprop="headline"><a href="blog-detail.html" title=""
                                                                itemprop="url">Food Tech</a></h5>
                                                        <span class="mini-post-data"><i class="fa fa-clock-o"></i> May
                                                            15, 2017</span>
                                                    </div>
                                                </div>
                                                <div class="mini-post-item">
                                                    <a href="blog-detail-right-sidebar.html" title=""
                                                        itemprop="url"><img class="brd-rd2"
                                                            src="assets/images/resource/popular-post-img4.jpg"
                                                            alt="popular-post-img4.jpg" itemprop="image"></a>
                                                    <div class="mini-post-info">
                                                        <h5 itemprop="headline"><a href="blog-detail-right-sidebar.html"
                                                                title="" itemprop="url">Food Tech</a></h5>
                                                        <span class="mini-post-data"><i class="fa fa-clock-o"></i>
                                                            March 20, 2017</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget style2 quick_filters wow fadeIn" data-wow-delay="0.2s">
                                        <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Quick Filters</h4>
                                        <div class="widget-data">
                                            <ul>
                                                <li><span class="radio-box"><input type="radio" name="filter"
                                                            id="filt1-1"><label for="filt1-1">Promotions</label></span>
                                                </li>
                                                <li><span class="radio-box"><input type="radio" name="filter"
                                                            id="filt1-2"><label for="filt1-2">Bookmarked</label></span>
                                                </li>
                                                <li><span class="radio-box"><input type="radio" name="filter"
                                                            id="filt1-3"><label for="filt1-3">Pure
                                                            veg</label></span></li>
                                                <li><span class="radio-box"><input type="radio" name="filter"
                                                            id="filt1-4"><label for="filt1-4">Free
                                                            Delivery</label></span></li>
                                                <li><span class="radio-box"><input type="radio" name="filter"
                                                            id="filt1-5"><label for="filt1-5">Online
                                                            Payments</label></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="widget style2 quick_filters wow fadeIn" data-wow-delay="0.2s">
                                        <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Quick Filters</h4>
                                        <div class="widget-data">
                                            <ul>
                                                <li><span class="radio-box"><input type="radio" name="filter2"
                                                            id="filt2-1"><label for="filt2-1">No minimum order
                                                            6</label></span></li>
                                                <li><span class="radio-box"><input type="radio" name="filter2"
                                                            id="filt2-2"><label for="filt2-2">Up to ₹150
                                                            69</label></span></li>
                                                <li><span class="radio-box"><input type="radio" name="filter2"
                                                            id="filt2-3"><label for="filt2-3">Up to ₹250
                                                            72</label></span></li>
                                                <li><span class="radio-box"><input type="radio" name="filter2"
                                                            id="filt2-4"><label for="filt2-4">Up to
                                                            ₹500</label></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!--Sidebar -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
