<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('admin.dashboard') }}"> <img src="{{ asset('admin/vendors/images/deskapp-logo.svg') }}"
                alt="" class="dark-logo" />
            <img src="{{ asset('admin/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('admin.users.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-people"></span>
                        <span class="mtext">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.cuisines.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-tag"></span>
                        <span class="mtext">Cuisines</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.restaurants.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-shop"></span>
                        <span class="mtext">Restaurants</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.foods.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-egg-fried"></span>
                        <span class="mtext">Foods</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route('admin.cuisines.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-tag"></span>
                        <span class="mtext">Cuisines</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.orders.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon"><i class="fa fa-cutlery" aria-hidden="true"></i></span>
                        <span class="mtext">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.bookings.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-calendar2-check"></span>
                        <span class="mtext">Bookings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.reviews.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-star"></span>
                        <span class="mtext">Reviews</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
