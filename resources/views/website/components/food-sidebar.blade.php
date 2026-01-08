<div class="col-md-2 col-sm-12 col-lg-2">
    <div class="sidebar left">
        <div class="widget style2 Search_filters">
            <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Search Filters</h4>
            <div class="widget-data">
                <ul>
                    <li class="{{ empty($cuisineId) ? 'active' : '' }}">
                        <a href="{{ route('food.index') }}">All Cuisines</a>
                    </li>
                    @foreach ($cuisines as $cuisine)
                        <li class="{{ isset($cuisineId) && $cuisineId == $cuisine->id ? 'active' : '' }}">
                            <a href="{{ route('food.index', ['cuisine' => $cuisine->id]) }}">
                                {{ $cuisine->name }}
                            </a>
                            <span>{{ $cuisine->foods_count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div> 
    </div><!--Sidebar -->
</div>