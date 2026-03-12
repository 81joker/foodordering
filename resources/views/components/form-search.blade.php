<form class="restaurant-search-form brd-rd2" method="post" action="{{ route('restaurant.search') }}">
    @csrf
    <div class="row mrg10">
        <div class="col-md-6 col-sm-5 col-lg-5 col-xs-12">
            <div class="input-field brd-rd2"><input class="brd-rd2" type="text" name="restaurant_name"
                    placeholder="Restaurant Name"></div>
        </div>
        <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
            <div class="input-field brd-rd2"><input class="brd-rd2" type="text" name="food_name"
                    placeholder="Food Name"></div>
        </div>
        <div class="col-md-2 col-sm-3 col-lg-3 col-xs-12">
            <button class="brd-rd2 red-bg" type="submit">SEARCH</button>
        </div>
    </div>
</form>