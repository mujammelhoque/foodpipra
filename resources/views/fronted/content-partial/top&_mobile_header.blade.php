<div class="ps-top-bar">
    <div class="container">
        <div class="top-bar">
            <div class="top-bar__left">
                <ul class="nav-top-dark">
                    <li class="nav-top-item"><a href="javascript:void(0);"><i class='icon-map-marker'></i> Jatrabari,
                        Dhaka, 1362</a></li>
                    <li class="nav-top-item"><a href="javascript:void(0);"><i class='icon-telephone'></i> +880 1873257449</a></li>
                </ul>
            </div>
            <div class="top-bar__right">
                <ul class="nav-top">
                    {{-- <li class="nav-top-item"><a class="nav-top-link" href="order-tracking.html">Order Tracking</a></li> --}}
                    {{-- <li class="nav-top-item languages"><a class="nav-top-link" href="javascript:void(0);"> <span class="current-languages">English</span><i class="icon-chevron-down"></i></a>
                        <div class="select--dropdown">
                            <ul class="select-languages">
                                <li class="active language-item" data-value="English"><a href="javascript:void(0);">English</a></li>
                                <li class="language-item" data-value="Brunei"><a href="javascript:void(0);">Brunei</a></li>
                                <li class="language-item" data-value="Armenia"><a href="javascript:void(0);">Armenia</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-top-item currency"><a class="nav-top-link" href="javascript:void(0);"> <span class="current-currency">USD</span><i class="icon-chevron-down"></i></a>
                        <div class="select--dropdown">
                            <ul class="select-currency">
                                <li class="active currency-item" data-value="USD"><a href="javascript:void(0);">USD</a></li>
                                <li class="currency-item" data-value="VND"><a href="javascript:void(0);">VND</a></li>
                                <li class="currency-item" data-value="EUR"><a href="javascript:void(0);">EUR</a></li>
                            </ul>
                        </div>
                    </li> --}}

                        @auth
                        <li id="navbarDropdown"  class="nav-top-item account"><a class="nav-top-link dropdown-toggle"  href="#" > <i class="icon-user"></i><span class="font-bold"> {{ auth()->user()->name }} </span></a>
                        @endauth
                    @guest
                    <li class="nav-top-item account"><a class="nav-top-link" href="{{ route('user.login') }}"> <i class="icon-user"></i><span class="font-bold">Sign In </span></a>    @endguest
                        <div class="account--dropdown">
                            <div class="account-anchor">
                                <div class="triangle"></div>
                            </div>
                            <div class="account__content">
                                <ul class="account-list">
                                    {{-- <li class="title-item"><a href="javascript:void(0);">My Account</a></li> --}}
                                    
                                    @auth
                                    <li><a class="font-bold" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         <i class="icon-exit-left"></i>{{ __('Logout') }}
                                     </a>
                     
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                         @csrf
                                     </form></li>
                                    @endauth
                                
                                    {{-- <li><a href="#">Dasdboard</a></li>
                                    <li><a href="#">Account Setting</a></li>
                                    <li><a href="shopping-cart.html">Orders</a></li>
                                    <li><a href="#">Wishlist</a></li>
                                    <li><a href="#">Shipping Address</a></li> --}}
                                </ul>
                                <hr>
                                {{-- <ul class="account-list">
                                    <li class="title-item"><a href="javascript:void(0);">Vendor Settings</a></li>
                                    <li><a href="#">Dasdboard</a></li>
                                    <li><a href="#">Products</a></li>
                                    <li><a href="shopping-cart.html">Orders</a></li>
                                    <li><a href="#">Settings</a></li>
                                    <li><a href="vendor-store.html">View Store</a></li>
                                </ul> --}}
                                {{-- <hr><a class="account-logout" href="#"><i class="icon-exit-left"></i>Log out</a> --}}
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="ps-header--center header--mobile">
    <div class="container">
        <div class="header-inner">
            <div class="header-inner__left">
                <button class="navbar-toggler"><i class="icon-menu"></i></button>
            </div>
            <div class="header-inner__center"><a class="logo open" href="{{ route('/') }}">Food<span class="text-dark">pipra</span></a></div>
            <div class="header-inner__right">
                <button class="button-icon icon-sm search-mobile"><i class="icon-magnifier"></i></button>
            </div>
        </div>
    </div>
</div>