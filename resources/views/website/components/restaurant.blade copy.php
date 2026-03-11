<div class="col-md-6 col-sm-6 col-lg-6">
    <div class="featured-restaurant-box with-bg style2 brd-rd12">

        <div class="featured-restaurant-thumb">
            <a href="{{ route('website.restaurants.show', $restaurant->id) }}">
                <img 
                    src="{{ asset("images/restaurants/{$restaurant->id}/logo.png") }}"
                    onerror="this.src='{{ asset("images/no-img.png") }}'"
                    alt="{{ $restaurant->name }}"
                >
            </a>
        </div>

        <div class="featured-restaurant-info">
            <span class="red-clr">{{ $restaurant->address ?? 'Address not available' }}</span>

            <h4>
                <a href="{{ route('website.restaurants.show', $restaurant->id) }}">
                    {{ $restaurant->name }}
                </a>
            </h4>

            <span class="food-types">
                Type of food:
                @foreach ($restaurant->cuisines as $cuisine)
                    <a href="#">{{ $cuisine->name }}</a>@if(!$loop->last), @endif
                @endforeach
            </span>

            <span class="post-rate yellow-bg brd-rd2">
                <i class="fa fa-star-o"></i>
                {{ $restaurant->avg_rating }}
            </span>

            <a class="brd-rd30" href="{{ route('website.restaurants.show', $restaurant->id) }}">
                <i class="fa fa-angle-double-right"></i> Order Online
            </a>
        </div>
    </div>
</div>
