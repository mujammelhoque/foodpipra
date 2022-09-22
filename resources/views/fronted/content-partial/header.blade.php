
<section class="ps-header--center header-desktop">
    <div class="container">
        <div class="header-inner">
            <div class="header-inner__left"><a class="logo" href="{{ route('/') }}">Food<b class="text-white">pipra.</b></a>
                <button class="category-toggler"><i class="icon-menu"></i></button>
            </div>
            <div class="header-inner__center">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="header-search-select"><span class="current">All<i class="icon-chevron-down"></i></span>
                            <ul class="list">
                                <li class="category-option active" data-value="option"><a href="javascript:void(0);">All</a></li>
                                
                                @forelse ($categories as $category)
                                <li class="category-option"><a href="{{ route('category.all',$category->id) }}">{{ $category->name }}</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                                    <ul>
                                        {{-- childs start--}}
                                        @if(count($category->childs))
                                            @include('fronted.content-partial.manageChild2',['childs' => $category->childs])
                                        @endif
                                        {{-- childs start--}}
                                    </ul>
                                </li>
                                @empty
                                    
                                @endforelse
                           

                            </ul>
                        </div><i class="icon-magnifier search"></i>
                    </div>
                    <input class="form-control input-search" placeholder="I'm searchching for...">
                    <div class="input-group-append">
                        <button class="btn">Search</button>
                    </div>
                </div>
                {{-- <div class="result-search">
                    <ul class="list-result">
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_18a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html"><u>Organic</u> Large Green Bell Pepper</a>
                                    <p class="ps-product__rating">
                                        <select class="rating-stars">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3" selected="selected">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select><span>(5)</span>
                                    </p>
                                    <p class="ps-product__meta"> <span class="ps-product__price">$6.90</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_16a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Avocado <u>Organic</u> Hass Large</a>
                                    <p class="ps-product__meta"> <span class="ps-product__price">$12.90</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_32a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Tailgater Ham <u>Organic</u> Sandwich</a>
                                    <p class="ps-product__meta"> <span class="ps-product__price">$33.49</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_6a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Extreme <u>Organic</u> Light Can</a>
                                    <p class="ps-product__rating">
                                        <select class="rating-stars">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select><span>(16)</span>
                                    </p>
                                    <p class="ps-product__meta"> <span class="ps-product__price-sale">$4.99</span><span class="ps-product__is-sale">$8.99</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_22a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Extreme <u>Organic</u> Light Can</a>
                                    <p class="ps-product__meta"> <span class="ps-product__price">$12.99</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div> --}}
            </div>

            <div class="header-inner__right">
                <div class="button-icon btn-cart-header"><i class="icon-cart icon-shop5 text-primary"></i><span class="badge bg-warning">{{ count($carts)}}</span>
                    <div class="mini-cart">
                        <div class="mini-cart--content">
                            <div class="mini-cart--overlay"></div>
                            <div class="mini-cart--slidebar cart--box">
                                <div class="mini-cart__header">
                                    <div class="cart-header-title">
                                        <h5>Shopping Cart ({{ count($carts)}})</h5><a class="close-cart" href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="mini-cart__products">
                                    <div class="out-box-cart">
                                        <div class="triangle-box">
                                            <div class="triangle"></div>
                                        </div>
                                    </div>
                                    <ul class="list-cart">
                                   @php
                                        $total=0;
                                   @endphp
                                        @foreach ($carts as $cart)
                                     @php
                                     $total+= $cart->products->price * $cart->product_qty
                                     @endphp
                                        <li class="cart-item">
                                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="{{asset('upload/featured-image/'.$cart->products->photo)  }}" alt="alt" /></a>
                                                <div class="ps-product__content"><a class="ps-product__name" href="{{ route('product.view',$cart->product_id) }}">{{ $cart->products->name }}</a>
                                                    {{-- <p class="ps-product__unit">500g</p> --}}
                                                    <p class="ps-product__meta"> <span class="ps-product__price">{{ $cart->products->price}}</span><span class="ps-product__quantity">(x{{ $cart->product_qty }})</span>
                                                    </p>
                                                </div>
                                                <div class="ps-product__remove"><a href="{{ url('delete-cart-item/'.$cart->id) }}"><i class="icon-trash2"></i></a></div>
                                            </div>
                                        </li>
                                        @endforeach
                                            
                                      
                                    </ul>
                                </div>
                                <div class="mini-cart__footer row">
                                    <div class="col-6 title">TOTAL</div>
                                    <div class="col-6 text-right total">{{ $total }}/-</div>
                                    <div class="col-12 d-flex"><a class="view-cart" href="{{ route('cart.view') }}">View cart</a><a class="checkout" href="{{ route('billing.address') }}">Checkout</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="ps-top__total">Shopping Cart<b>$129.98</b></div> --}}
            </div>
        </div>
    </div>
</section>