@extends('website.layouts.app')
 
@section('content') 
        <div class="bread-crumbs-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </div>
        </div> 
        <section>
            <div class="block top-padd30 gray-bg">
                
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="sec-box">
                                <div class="reservation-tabs-wrapper">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12 col-lg-3">
                                            <div class="reservation-tabs-list brd-rd5">
                                                <ul class="nav nav-tabs brd-rd5"> 
                                                    <li class="active"><a href="#reservation-tab1" data-toggle="tab"><span class="brd-rd50">2</span> Checkout</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-12 col-lg-9">
                                            <div class="reservation-tab-content">
                                                <div class="tab-content"> 
                                                    <div class="tab-pane fade in active" id="reservation-tab1">
                                                        <div class="order-wrapper2 brd-rd5">
                                                            <form id="update-all-form" action="{{ route('cart.update') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="update_all" value="1">

                                                                <div class="reservation-header" style="display:flex; justify-content:space-between; align-items:center;">
                                                                    <h4 itemprop="headline">YOUR ORDER</h4>
                                                                    <button type="submit" class="red-bg brd-rd5" style="color:#fff;border:0; padding:8px 16px; cursor:pointer;">
                                                                        Update
                                                                    </button>
                                                                </div>

                                                                <ul class="ordr-lst brd-rd5">

                                                                    <li class="lst-hed">PRODUCT <span>TOTAL</span></li>

                                                                    @php $subtotal = 0; @endphp

                                                                    @foreach(session('cart', []) as $id => $item)
                                                                        @php
                                                                            $price = (float) $item['price'];          // convertir en float
                                                                            $qty   = (int) $item['quantity'];         // convertir en int
                                                                            $lineTotal = $price * $qty;
                                                                            $subtotal += $lineTotal;
                                                                        @endphp

                                                                        <li class="li-order-list">
                                                                            <div class="order-list">
                                                                                <!-- Name -->
                                                                                <div class="order-list-name">
                                                                                    {{ $item['name'] }}
                                                                                </div>
                                                                                <!-- price -->
                                                                                <div  class="order-list-ut">
                                                                                    {{ $item['price'] }}
                                                                                </div>

                                                                                <!-- Qty -->
                                                                                <div class="qty-wrap">
                                                                                    <input class="qty" type="number"
                                                                                        name="quantity[{{ $item['id'] }}]"
                                                                                        value="{{ $qty }}"
                                                                                        min="1"
                                                                                        style="width:60px; text-align:center;">
                                                                                </div>

                                                                                <!-- Line total -->
                                                                                <div class="order-list-price">
                                                                                    ${{ number_format($lineTotal, 2) }}
                                                                                </div>

                                                                                <!-- Delete -->
                                                                                <div class="order-list-btn" style="width:60px; text-align:right;">
                                                                                    <form action="{{ route('cart.remove') }}" method="POST">
                                                                                        @csrf
                                                                                        <input type="hidden" name="food_id" value="{{ $item['id'] }}">
                                                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                                                            <i class="fa fa-trash"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach

                                                                    <!-- Summary -->
                                                                    @php
                                                                        $tax = $subtotal * 0.03;
                                                                    @endphp
                                                                    <li>Subtotal <span>${{ number_format($subtotal, 2) }}</span></li>
                                                                    <li>Gov Tax <span>${{ number_format($tax, 2) }}</span></li>
                                                                    <li class="red-bg">Total <span>${{ number_format($subtotal + $tax, 2) }}</span></li>

                                                                </ul>
                                                            </form>

                                                            <form  action="{{ route('checkout.place_order') }}" method="POST" class="restaurant-info-form checkout-info-form brd-rd5">
                                                                @csrf
                                                                <div>
                                                                    <div>
                                                                        <label>name <sup>*</sup></label>
                                                                        <input name="name" class="brd-rd3" type="text">
                                                                    </div>
                                                                    <div>
                                                                        <label>phone <sup>*</sup></label>
                                                                        <input name="phone" class="brd-rd3" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="pay-mnt"> 
                                                                    <span class="radio-box">
                                                                        <input type="radio" name="pay_mthd" value="cash" id="mthd1">
                                                                        <label for="mthd1">Cash on delivery</label>
                                                                    </span>
                                                                    <span class="radio-box">
                                                                        <input type="radio" name="pay_mthd" value="online" id="mthd2">
                                                                        <label for="mthd2">Paypal <img src="assets/images/pay-mthd-img.jpg" alt="pay-mthd-img.jpg" itemprop="image"></label>
                                                                    </span>
                                                                </div>
                                                                <div class="ordr-btn">
                                                                    <button class="red-bg brd-rd5" type="submit">Place Order</button> 
                                                                </div>
                                                            </form> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div><!-- Section Box -->
                            </div>
                        </div>
                    </div>
                
            </div>
        </section>
@endsection 