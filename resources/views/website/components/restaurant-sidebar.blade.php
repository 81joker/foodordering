<div class="sidebar left">
    <div class="widget style2 Search_filters">
        <h4 class="widget-title2 sudo-bg-red">Search Filters</h4>
        <div class="widget-data">
            <ul>
                <li class="{{ empty($cuisineId) ? 'active' : '' }}">
                    <a href="{{ route('restaurant.index') }}">All Cuisines</a>
                </li>
                @foreach ($cuisines as $cuisine)
                    <li class="{{ isset($cuisineId) && $cuisineId == $cuisine->id ? 'active' : '' }}">
                        <a href="{{ route('restaurant.index', ['cuisine' => $cuisine->id]) }}">
                            {{ $cuisine->name }}
                        </a>
                        <span>{{ $cuisine->restaurants_count }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div> 
</div>
