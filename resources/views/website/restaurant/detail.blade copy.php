@extends('website.layouts.app')

@section('content')
    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Restaurant</a></li>
                <li class="breadcrumb-item active">Restaurant Details</li>
            </ol>
        </div>
    </div>

    <section class="restaurant-detail">
        <div class="block gray-bg top-padd30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="sec-wrapper">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <div class="restaurant-detail-wrapper">
                                            <div class="restaurant-detail-info">
                                                <div class="restaurant-detail-thumb">
                                                    <ul class="restaurant-detail-img-carousel">
                                                        <li><img src="{{ asset('images/restaurants/slider/blog-detial-gallery-img1.jpg') }}"
                                                                alt="restaurant-detail-big-img1-1.jpg" itemprop="image">
                                                        </li>
                                                        <li><img src="{{ asset('images/restaurants/slider/blog-detial-gallery-img2.jpg') }}"
                                                                alt="restaurant-detail-big-img1-2.jpg" itemprop="image">
                                                        </li>
                                                        <li><img src="{{ asset('images/restaurants/slider/blog-detial-gallery-img3.jpg') }}"
                                                                alt="restaurant-detail-big-img1-3.jpg" itemprop="image">
                                                        </li>

                                                        {{-- <li><img src="{{ asset("images/restaurants/{$restaurant->id}/b1.jpg") }}" alt="restaurant-detail-big-img1-1.jpg" itemprop="image"></li>
                                                            <li><img src="{{ asset("images/restaurants/{$restaurant->id}/b2.jpg") }}" alt="restaurant-detail-big-img1-2.jpg" itemprop="image"></li>
                                                            <li><img src="{{ asset("images/restaurants/{$restaurant->id}/b3.jpg") }}" alt="restaurant-detail-big-img1-3.jpg" itemprop="image"></li>
                                                            <li><img src="{{ asset("images/restaurants/{$restaurant->id}/b4.jpg") }}" alt="restaurant-detail-big-img1-4.jpg" itemprop="image"></li> --}}
                                                    </ul>
                                                    <ul class="restaurant-detail-thumb-carousel">
                                                        <li><img src="{{ asset('images/restaurants/slider/blog-detial-gallery-img1.jpg') }}"
                                                                alt="restaurant-detail-small-img1-1.jpg" itemprop="image">
                                                        </li>
                                                        <li><img src="{{ asset('images/restaurants/slider/blog-detial-gallery-img2.jpg') }}"
                                                                alt="restaurant-detail-small-img1-2.jpg" itemprop="image">
                                                        </li>
                                                        <li><img src="{{ asset('images/restaurants/slider/blog-detial-gallery-img3.jpg') }}"
                                                                alt="restaurant-detail-small-img1-3.jpg" itemprop="image">
                                                        </li>
                                                        {{-- <li><img src="{{ asset("images/restaurants/{$restaurant->id}/b1.jpg") }}" alt="restaurant-detail-small-img1-1.jpg" itemprop="image"></li>
                                                            <li><img src="{{ asset("images/restaurants/{$restaurant->id}/b2.jpg") }}" alt="restaurant-detail-small-img1-2.jpg" itemprop="image"></li>
                                                            <li><img src="{{ asset("images/restaurants/{$restaurant->id}/b3.jpg") }}" alt="restaurant-detail-small-img1-3.jpg" itemprop="image"></li>
                                                            <li><img src="{{ asset("images/restaurants/{$restaurant->id}/b4.jpg") }}" alt="restaurant-detail-small-img1-4.jpg" itemprop="image"></li> --}}
                                                    </ul>
                                                </div>
                                                <div class="restaurant-detail-title">
                                                    <h1 itemprop="headline">{{ $restaurant->name }}</h1>
                                                    <div class="info-meta">
                                                        <span>{{ $restaurant->name }}</span>
                                                        <span>
                                                            @foreach ($restaurant->cuisines as $cuisine)
                                                                <a href="#">{{ $cuisine->name }}</a>
                                                                @if (!$loop->last)
                                                                    ,
                                                                @endif
                                                            @endforeach
                                                        </span>
                                                    </div>
                                                    <div class="rating-wrapper">
                                                        <a class="gradient-brd brd-rd2">
                                                            <i class="fa fa-star"></i> Rate
                                                            <i>{{ $restaurant->avg_rating }}</i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="restaurant-detail-tabs">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tab1-4" data-toggle="tab"><i
                                                                    class="fa fa-book"></i> Book A Table</a></li>
                                                        <li><a href="#tab1-3" data-toggle="tab"><i class="fa fa-star"></i>
                                                                Reviews</a></li>
                                                        <li><a href="#tab1-5" data-toggle="tab"><i class="fa fa-info"></i>
                                                                Restaurant Info</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="tab1-4">
                                                            <div class="book-table">
                                                                <h4 class="title3" itemprop="headline"><span
                                                                        class="sudo-bottom sudo-bg-red">Book</span> This
                                                                    Restaurant Table</h4>
                                                                <form
                                                                    action="{{ route('website.bookings.store', $restaurant->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                                                            <div class="input-field brd-rd2">
                                                                                <i class="fa fa-user"></i>
                                                                                <input type="text" name="name"
                                                                                    placeholder="NAME" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                                                            <div class="input-field brd-rd2">
                                                                                <i class="fa fa-phone"></i>
                                                                                <input type="text" name="phone"
                                                                                    placeholder="PHONE">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                                                            <div class="select-wrp2">
                                                                                <select name="number_of_people" required>
                                                                                    <option value="">Number of people
                                                                                    </option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                                                            <div class="input-field brd-rd2">
                                                                                <i class="fa fa-envelope"></i>
                                                                                <input type="email" name="email"
                                                                                    placeholder="EMAIL" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                                                            <div class="input-field brd-rd2">
                                                                                <i class="fa fa-calendar"></i>
                                                                                <input class="datepicker" type="text"
                                                                                    name="booking_date"
                                                                                    placeholder="SELECT DATE" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                                                            <div class="input-field brd-rd2">
                                                                                <i class="fa fa-clock-o"></i>
                                                                                <input class="timepicker" type="text"
                                                                                    name="booking_time"
                                                                                    placeholder="SELECT TIME" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <div class="textarea-field brd-rd2">
                                                                                <i class="fa fa-pencil"></i>
                                                                                <textarea name="comment" placeholder="Your Instruction"></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <button class="brd-rd2 red-bg"
                                                                                type="submit">POST PREVIEW</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab1-3">
                                                            <div class="customer-review-wrapper">
                                                                <h4 class="title3" itemprop="headline"><span
                                                                        class="sudo-bottom sudo-bg-red">Custo</span>mer
                                                                    Reviews</h4>
                                                                <ul class="comments-thread customer-reviews">
                                                                    <li>
                                                                        <div class="comment">
                                                                            <img class="brd-rd50"
                                                                                src="assets/images/resource/review-img1.jpg"
                                                                                alt="review-img1.jpg" itemprop="image">
                                                                            <div class="comment-info">
                                                                                <h4 itemprop="headline"><a href="#"
                                                                                        title="" itemprop="url">John
                                                                                        Mathur</a></h4>
                                                                                <p itemprop="description">Lorem ipsum dolor
                                                                                    sit amet, pri nusquam petentium at. In
                                                                                    mutat omnes homero mea, pro delenit
                                                                                    accusam eu</p>
                                                                                <span class="customer-rating">
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <span>(4)</span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="comment">
                                                                            <img class="brd-rd50"
                                                                                src="assets/images/resource/review-img2.jpg"
                                                                                alt="review-img2.jpg" itemprop="image">
                                                                            <div class="comment-info">
                                                                                <h4 itemprop="headline"><a href="#"
                                                                                        title="" itemprop="url">John
                                                                                        Mathur</a></h4>
                                                                                <p itemprop="description">Lorem ipsum dolor
                                                                                    sit amet, pri nusquam petentium at. In
                                                                                    mutat omnes homero mea, pro delenit
                                                                                    accusam eu</p>
                                                                                <span class="customer-rating">
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <span>(4)</span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="comment">
                                                                            <img class="brd-rd50"
                                                                                src="assets/images/resource/review-img3.jpg"
                                                                                alt="review-img3.jpg" itemprop="image">
                                                                            <div class="comment-info">
                                                                                <h4 itemprop="headline"><a href="#"
                                                                                        title="" itemprop="url">John
                                                                                        Mathur</a></h4>
                                                                                <p itemprop="description">Lorem ipsum dolor
                                                                                    sit amet, pri nusquam petentium at. In
                                                                                    mutat omnes homero mea, pro delenit
                                                                                    accusam eu</p>
                                                                                <span class="customer-rating">
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <span>(4)</span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <div class="your-review">
                                                                    <h4 class="title3" itemprop="headline"><span
                                                                            class="sudo-bottom sudo-bg-red">Write</span>
                                                                        Review Here</h4>
                                                                    <form class="review-form">
                                                                        <textarea class="brd-rd5">Lorem ipsum dolor sit amet, pri nusquam petentium at. In mutatomnes homero mea, pro delenit accusam eu</textarea>
                                                                        <button class="brd-rd2 red-bg" type="submit">POST
                                                                            REVIEW</button>
                                                                        <div class="rate-box">
                                                                            <span>RATE US</span>
                                                                            <div class="rating-box">
                                                                                <span class="brd-rd2 clr1 on"></span>
                                                                                <span class="brd-rd2 clr2 on"></span>
                                                                                <span class="brd-rd2 clr3 on"></span>
                                                                                <span class="brd-rd2 clr4 on"></span>
                                                                                <span class="brd-rd2 clr5 on"></span>
                                                                                <span class="brd-rd2 clr6 on"></span>
                                                                                <span class="brd-rd2 clr7 off"></span>
                                                                                <span class="brd-rd2 clr8 off"></span>
                                                                                <i>4.0</i>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab1-5">
                                                            <div class="restaurant-info-wrapper">
                                                                <h3 class="title3" itemprop="headline"><span
                                                                        class="sudo-bottom sudo-bg-red">Book</span> This
                                                                    Restaurant Table</h3>
                                                                <div class="loc-map" id="loc-map"></div>
                                                                <ul class="restaurant-info-list">
                                                                    <li>
                                                                        <i class="fa fa-map-marker red-clr"></i>
                                                                        <strong>Address :</strong>
                                                                        <span>2nd Street, East-West Mansion Flat A2 231
                                                                            Newyork NY 10003</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-phone red-clr"></i>
                                                                        <strong>Call us & Hire us</strong>
                                                                        <span>+32 (0) 598 65 8968</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-envelope-o red-clr"></i>
                                                                        <strong>Have any questions?</strong>
                                                                        <span>Support@webinane.com</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-fax red-clr"></i>
                                                                        <strong>Fax</strong>
                                                                        <span>+652 235 89658965</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <div class="title1-wrapper text-center">
                                            <div class="title1-inner">
                                                <span>Menu</span>
                                            </div>
                                        </div>
                                        <div class="remove-ext">
                                            <div class="row">
                                                @foreach ($foods as $food)
                                                    @include('website.components.food-card', [
                                                        'food' => $food,
                                                        'restaurant' => $restaurant,
                                                    ])
                                                @endforeach

                                            </div>
                                        </div>
                                        {{ $foods->links('website.components.pagination') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
