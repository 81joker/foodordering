<div class="col-md-12 col-sm-12 col-lg-6 filter-item filter-item1 filter-item2">
    <div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.6s">
        <div class="featured-restaurant-thumb">
            <a href="{{ route('website.food.show', $food->id) }}" title="" itemprop="url">
                @php
                    $folder = public_path("images/foods/{$food->id}");
                    $images = glob($folder . '/*');
                @endphp
                @if (!empty($images))
                    <img src="{{ asset('images/foods/' . $food->id . '/' . basename($images[0])) }}"
                       class="brd-rd50" alt="{{ $food->food_name }}" style="width: 100px;height:100px;object-fit: cover; display: block;">
                @else
                    <img src="{{ asset('images/no-img.png') }}"class="brd-rd50"
                        alt="{{ $food->food_name }}" style="width: 100px;height:100px;object-fit: cover; display: block;">
                @endif
            
            </a>
        </div>
        <div class="featured-restaurant-info">
            <span class="red-clr">{{ $food->restaurant->address }}</span>
            <h4 itemprop="headline">
                <a href="{{ route('website.food.show', $food->id) }}" title="" itemprop="url">{{ $food->food_name }}</a>
            </h4>
            <span class="price">${{ $food->price }}</span>
            <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> {{ $food->avg_rating }}</span>
        </div>
    </div>
</div>