@extends('website.layouts.app')
 
@section('content')  
        <div class="bread-crumbs-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Search</a></li>
                    <li class="breadcrumb-item active">Restaurants Found</li>
                </ol>
            </div>
        </div>

        <section class="restaurant-found">
            <div class="block gray-bg bottom-padd210 top-padd30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="sec-box">
                                <div class="top-restaurants-wrapper">
                                    <ul class="restaurants-wrapper style2">
                                        <li class="wow bounceIn" data-wow-delay="0.2s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 1" itemprop="url"><img src="assets/images/resource/top-restaurant1.png" alt="top-restaurant1.png" itemprop="image"></a></div></li>
                                        <li class="wow bounceIn" data-wow-delay="0.4s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 2" itemprop="url"><img src="assets/images/resource/top-restaurant2.png" alt="top-restaurant2.png" itemprop="image"></a></div></li>
                                        <li class="wow bounceIn" data-wow-delay="0.6s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 3" itemprop="url"><img src="assets/images/resource/top-restaurant3.png" alt="top-restaurant3.png" itemprop="image"></a></div></li>
                                        <li class="wow bounceIn" data-wow-delay="0.8s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 4" itemprop="url"><img src="assets/images/resource/top-restaurant4.png" alt="top-restaurant4.png" itemprop="image"></a></div></li>
                                        <li class="wow bounceIn" data-wow-delay="1s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 5" itemprop="url"><img src="assets/images/resource/top-restaurant5.png" alt="top-restaurant5.png" itemprop="image"></a></div></li>
                                        <li class="wow bounceIn" data-wow-delay="1.2s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 5" itemprop="url"><img src="assets/images/resource/top-restaurant6.png" alt="top-restaurant6.png" itemprop="image"></a></div></li>
                                    </ul>
                                </div>
                                <div class="sec-wrapper top-padd80">
                                    <div class="row">

                                        <!-- Sidebar -->
                                        <div class="col-md-3">
                                            @include('website.components.restaurant-sidebar', ['cuisines' => $cuisines])
                                        </div>

                                        <!-- Restaurants -->
                                        <div class="col-md-9 col-sm-12 col-lg-9">
                                            <div class="remove-ext">
                                                <div class="row">
                                                    @foreach ($restaurants as $restaurant)
                                                        @include('website.components.restaurant', ['restaurant' => $restaurant])
                                                    @endforeach
                                                </div>
                                            </div> 
                                            <!-- Pagination -->
                                            {{ $restaurants->links('website.components.pagination') }} 
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