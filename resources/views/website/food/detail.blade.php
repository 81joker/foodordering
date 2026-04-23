@extends('website.layouts.app')

@section('content')
    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">Food Details</li>
            </ol>
        </div>
    </div>
    <section>
        <div class="block gray-bg bottom-padd210 top-padd30">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sec-box">
                            <div class="sec-wrapper">
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
                                                    {{-- <li><img src="{{ asset("images/foods/{$food->id}/b1.jpg") }}"
                                                            alt="restaurant-detail-big-img1-1.jpg" itemprop="image"></li>
                                                    <li><img src="{{ asset("images/foods/{$food->id}/b2.jpg") }}"
                                                            alt="restaurant-detail-big-img1-2.jpg" itemprop="image"></li>
                                                    <li><img src="{{ asset("images/foods/{$food->id}/b3.jpg") }}"
                                                            alt="restaurant-detail-big-img1-3.jpg" itemprop="image"></li>
                                                    <li><img src="{{ asset("images/foods/{$food->id}/b4.jpg") }}"
                                                            alt="restaurant-detail-big-img1-4.jpg" itemprop="image"></li> --}}
                                                </ul>
                                                <ul class="restaurant-detail-thumb-carousel">
                                                    <li><img src="{{ asset('images/restaurants/slider/blog-detial-gallery-img1.jpg') }}"
                                                            alt="restaurant-detail-big-img1-1.jpg" itemprop="image">
                                                    </li>
                                                    <li><img src="{{ asset('images/restaurants/slider/blog-detial-gallery-img2.jpg') }}"
                                                            alt="restaurant-detail-big-img1-2.jpg" itemprop="image">
                                                    </li>
                                                    <li><img src="{{ asset('images/restaurants/slider/blog-detial-gallery-img3.jpg') }}"
                                                            alt="restaurant-detail-big-img1-3.jpg" itemprop="image">
                                                    </li>
                                                    {{-- <li><img src="{{ asset("images/foods/{$food->id}/s1.jpg") }}"
                                                            alt="restaurant-detail-small-img1-1.jpg" itemprop="image"></li>
                                                    <li><img src="{{ asset("images/foods/{$food->id}/s2.jpg") }}"
                                                            alt="restaurant-detail-small-img1-2.jpg" itemprop="image"></li>
                                                    <li><img src="{{ asset("images/foods/{$food->id}/s3.jpg") }}"
                                                            alt="restaurant-detail-small-img1-3.jpg" itemprop="image"></li>
                                                    <li><img src="{{ asset("images/foods/{$food->id}/s4.jpg") }}"
                                                            alt="restaurant-detail-small-img1-4.jpg" itemprop="image"></li> --}}
                                                </ul>
                                            </div>
                                            <div class="restaurant-detail-title">
                                                <h1 itemprop="headline">{{ $food->name }}</h1>
                                                <div class="info-meta">
                                                    <span>{{ $food->name }}</span>
                                                    <span><a href="#" title=""
                                                            itemprop="url">{{ $food->restaurant->name }}</a></span>
                                                </div>
                                                <div class="rating-wrapper">
                                                    <a class="gradient-brd brd-rd2" href="#" title=""
                                                        itemprop="url"><i class="fa fa-star"></i> Rate
                                                        <i>{{ $food->avg_rating }}</i></a>
                                                </div>
                                                <span class="price">${{ $food->price }}</span>
                                                <form class="add-cart-form" action="{{ route('cart.add') }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="food_id" value="{{ $food->id }}">
                                                    <div class="qty-wrap">
                                                        <input class="qty" type="number" name="quantity" value="1"
                                                            min="1">
                                                    </div>
                                                    <p itemprop="description">{{ $food->description }}</p>
                                                    <button type="submit" class="brd-rd3">Order Now</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Section Box -->
        </div>
    </section>
@endsection
