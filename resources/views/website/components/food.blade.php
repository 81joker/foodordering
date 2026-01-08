<div class="col-md-12 col-sm-12 col-lg-6 filter-item filter-item1 filter-item2">
    <div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.6s">
        <div class="featured-restaurant-thumb">
            <a href="{{ route('website.food.show', $food->id) }}" title="" itemprop="url"><img class="brd-rd50" src="{{ asset("images/foods/{$food->id}/1.jpg") }}" itemprop="image"></a>
        </div>
        <div class="featured-restaurant-info">
            <span class="red-clr">{{ $food->restaurant->address }}</span>
            <h4 itemprop="headline"><a href="{{ route('website.food.show', $food->id) }}" title="" itemprop="url">{{ $food->name }}</a></h4>
            <span class="price">${{ $food->price }}</span>
            <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> {{ $food->avg_rating }}</span>
        </div>
    </div>
</div>