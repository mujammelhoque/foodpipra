
<div class="ps-footer-mobile">
    <div class="menu__content">
        <ul class="menu--footer">
            <li class="nav-item"><a class="nav-link" href="{{ route('/') }}"><i class="icon-home3"></i><span>Home</span></a></li>
            <li class="nav-item"><a class="nav-link footer-category" href="javascript:void(0);"><i class="icon-list"></i><span>Category</span></a></li>
            <li class="nav-item"><a class="nav-link footer-cart" href="{{ route('cart.view') }}"><i class="icon-cart"></i><span class="badge bg-warning">{{ count((array) session('cart')) }}</span><span>Cart</span></a></li>
            <li class="nav-item"><a class="nav-link" href="wishlist.html"><i class="icon-heart"></i><span>Wishlist</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('user.login') }}"><i class="icon-user"></i><span>Account</span></a></li>
        </ul>
    </div>
</div>
<button class="btn scroll-top"><i class="icon-chevron-up"></i></button>
{{-- <div class="ps-preloader" id="preloader">
    <div class="ps-preloader-section ps-preloader-left"></div>
    <div class="ps-preloader-section ps-preloader-right"></div>
</div> --}}
<div class="ps-category--mobile">
    <div class="category__header">
        <div class="category__title">All Category</div><span class="category__close"><i class="icon-cross"></i></span>
    </div>
    <div class="category__content">
        <ul class="menu--mobile">
    @forelse ($categories as $category)
    <li class="menu-item-has-children category-item"><a href="shop-categories.html">{{ $category->name }}</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
        <ul class="sub-menu">
                 {{-- childs start--}}
                 @if(count($category->childs))
                 @include('fronted.content-partial.manageChildMobile',['childs' => $category->childs])
                 
             @endif
 {{-- childs end--}}
        </ul>
    </li> 
    @empty
        
    @endforelse


        </ul>
    </div>
</div>
<nav class="navigation--mobile">
    <div class="navigation__header">
        {{-- <div class="navigation__select">
            <div class="languages"><a class="nav-top-link" href="javascript:void(0);"> <span class="current-languages">English</span><i class="icon-chevron-down"></i></a>
                <div class="select--dropdown">
                    <ul class="select-languages">
                        <li class="active language-item" data-value="English"><a href="javascript:void(0);">English</a></li>
                        <li class="language-item" data-value="Brunei"><a href="javascript:void(0);">Brunei</a></li>
                        <li class="language-item" data-value="Armenia"><a href="javascript:void(0);">Armenia</a></li>
                    </ul>
                </div>
            </div>
            <div class="currency"><a class="nav-top-link" href="javascript:void(0);"> <span class="current-currency">USD</span><i class="icon-chevron-down"></i></a>
                <div class="select--dropdown">
                    <ul class="select-currency">
                        <li class="active currency-item" data-value="USD"><a href="javascript:void(0);">USD</a></li>
                        <li class="currency-item" data-value="VND"><a href="javascript:void(0);">VND</a></li>
                        <li class="currency-item" data-value="EUR"><a href="javascript:void(0);">EUR</a></li>
                    </ul>
                </div>
            </div>
        </div> --}}
        <div class="navigation-title">
            <button class="close-navbar-slide"><i class="icon-arrow-left"></i></button>
            <div><span> <i class="icon-user"></i> </span><span class="account">
                 @auth
                {{ auth()->user()->name }}
            @endauth
            @guest
                <a href="{{ route('user.login') }}">login</a>
            @endguest
             </span><a class="dropdown-user" href="#" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-chevron-down"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownAccount">

                    {{-- <a class="dropdown-item" href="#"><b>My Account</b></a><a class="dropdown-item" href="#">Dashboard</a><a class="dropdown-item" href="#">Account Setting</a><a class="dropdown-item" href="shopping-cart.html">Orders</a><a class="dropdown-item" href="wishlist.html">Wishlist</a><a class="dropdown-item" href="#">Shipping Address</a><a class="dropdown-divider"></a><a class="dropdown-item" href="#"><b>Vendor Setting</b></a><a class="dropdown-item" href="#">Dashboard</a><a class="dropdown-item" href="#">Products</a><a class="dropdown-item" href="shopping-cart.html">Orders</a><a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="vendor-store.html">View Store</a><a class="dropdown-divider"></a>
                     --}}
                    <a class="dropdown-item"  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    <i class="icon-exit-left"></i> {{ __('Logout') }}</a>
                    </div>
            </div>
        </div>
    </div>
    <div class="navigation__content">
        <ul class="menu--mobile">
            <li class="menu-item-has-children"><a href="{{ route('/') }}">Home</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
              
            </li>
            @forelse ($categories as $category)
            <li class="menu-item-has-children"><a href="#">{{ $category->name }}</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                <ul class="sub-menu">
                    @if(count($category->childs))
                            @include('fronted.content-partial.manageChild2',['childs' => $category->childs])
                     @endif
                </ul>
            </li>
            @empty
    
            @endforelse

        </ul>
    </div>
    <div class="navigation__footer">
        <ul class="menu--icon">
            <li class="footer-item"><a class="footer-link" href="#"><i class="icon-history2"></i><span>Recent viewed product</span></a></li>
            <li class="footer-item"><a class="footer-link" href="#"><i class="icon-cube"></i><span>Become a vendor</span></a></li>
            <li class="footer-item"><a class="footer-link" href="#"><i class="icon-question-circle"></i><span>Help & Contact</span></a></li>
            <li class="footer-item"><a class="footer-link" href="#"><i class="icon-telephone"></i><span>HOTLINE: <span class='text-success'>(+1) ***********</span> (Free)</span></a></li>
        </ul>
    </div>
</nav>