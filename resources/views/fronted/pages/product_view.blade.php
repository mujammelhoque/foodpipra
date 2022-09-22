@extends('fronted.layout.layout')

@section('content')
    

    <header class="header">
        @include('fronted.content-partial.top&_mobile_header')
        @include('fronted.content-partial.header')
        @include('fronted.content-partial.navbar')
        @include('fronted.content-partial.mobile_search_sidebar')
    </header>
    <main class="no-main">
      
        <section class="section--product-type section-product--default">
            <div class="container">
                <div class="product__header">
                    <h3 class="product__name">{{ $product->name }}</h3>
                    <div class="row">
                        <div class="col-12 col-lg-7 product__code">
                            <select class="rating-stars">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected="selected">4</option>
                                <option value="5">5</option>
                            </select><span class="product__review">4 Customer Review</span><span class="product__id">SKU: <span>#{{ $product->sku }}</span></span>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="ps-social--share"><a class="ps-social__icon facebook" href="#"><i class="fa fa-thumbs-up"></i><span>Like</span><span class="ps-social__number">0</span></a><a class="ps-social__icon facebook" href="#"><i class="fa fa-facebook-square"></i><span>Like</span><span class="ps-social__number">0</span></a><a class="ps-social__icon twitter" href="#"><i class="fa fa-twitter"></i><span>Like</span></a><a class="ps-social__icon" href="#"><i class="fa fa-plus-square"></i><span>Like</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="product__detail">
                    <div class="row">
                        <div class="col-12 col-lg-9">
                            <div class="ps-product--detail">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="ps-product__variants">
                                            <div class="ps-product__gallery">
                                                {{-- <div class="ps-gallery__item active">
                                                    <img src="{{ asset('upload/featured-image/'.$product->photo) }}" alt="alt" />
                                                </div> --}}
                                                @forelse ($more_image as $image)
                                                <div class="ps-gallery__item">
                                                    <img src="{{ asset('upload/more-image/'.$image->more_photo) }}" alt="alt" />
                                                </div>
                                                @empty
                                                    
                                                @endforelse
                                                    
                                                  
                                             
                                            </div>
                                            <div class="ps-product__thumbnail">
                                                <div class="ps-product__zoom"><img id="ps-product-zoom" src="{{ asset('upload/featured-image/'.$product->photo) }}" alt="alt" />
                                                    <ul class="ps-gallery--poster" id="ps-lightgallery-videos" data-video-url="#">
                                                        <li data-html="#video-play"><span></span><i class="fa fa-play-circle"></i></li>
                                                    </ul>
                                                </div>
                                                <div style="display:none;" id="video-play">
                                                    <video class="lg-video-object lg-html5" controls="controls" preload="none">
                                                        <source src="#" type="video/mp4" />Your browser does not support HTML5 video.
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 product_data_single">
                                    
                                        <div class="ps-product__sale"><span class="price-sale">{{ $product->price }}</span><span class="price">{{ $product->ori_price }}</span><span class="ps-product__off">{{ $product->discount }}% Off</span>
                                        </div>
                                        <div class="ps-product__avai alert__success">Availability: <span>{{ $product->stock }}in stock</span>
                                        </div>
                                        
                                        {{-- <div class="ps-product__shopping">
                                            <a class="ps-product__addcart ps-button" href="{{ route('add.to.cart', $product->id) }}"><i class="icon-cart"></i>Add to cart</a><a class="ps-product__icon" href="wishlist.html"><i class="icon-heart"></i></a><a class="ps-product__icon"><i class="icon-repeat"></i></a>
                                        </div> --}}
                                        <div class="ps-product__shopping ">
                                            <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}">
                                            <div class="ps-product__quantity">
                                                <label>Quantity: </label>
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                    <input class="quantity input_qty " min="0" name="input_qty" value="1" type="number" />
                                                    <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                                </div>
                                            </div><a class="ps-product__addcart ps-button addToCart" data-toggle="modal" data-target="#popupAddToCart"><i class="icon-cart"></i>Add to cart</a><a class="ps-product__icon" href="wishlist.html"><i class="icon-heart"></i></a><a class="ps-product__icon"><i class="icon-repeat"></i></a>
                                        </div>

                                        <div class="ps-product__category">
                                            <ul>
                                                <li>Brand: <a href='shop-all-brands.html' class='text-success'>{{ $product->brand }}</a></li>
                                                <li>Vendor: <a href='shop-all-brands.html' class='text-success'>{{ $product->user['shop_name'] }}</a></li>
                                                <li>Categories: <a href='shop-all-brands.html' class='text-success'>{{ $product->cat_info['name'] }}</a>
                                                    </li>
                                                
                                            </ul>
                                        </div>
                                        <div class="ps-product__social">
                                            <div class="ps-social--share"><a class="ps-social__icon facebook" href="#"><i class="fa fa-thumbs-up"></i><span>Like</span><span class="ps-social__number">0</span></a><a class="ps-social__icon facebook" href="#"><i class="fa fa-facebook-square"></i><span>Like</span><span class="ps-social__number">0</span></a><a class="ps-social__icon twitter" href="#"><i class="fa fa-twitter"></i><span>Like</span></a><a class="ps-social__icon" href="#"><i class="fa fa-plus-square"></i><span>Like</span></a></div>
                                        </div>
                                        <div class="ps-product__footer product_data_singleSM">

                                            <a class="ps-product__shop" href="{{ route('/') }}"><i class="icon-home"></i><span>home</span></a><a class="ps-product__addcart addToCartSM ps-button btn"  ><i class="icon-cart"></i>Add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="ps-product--extention">
                                <div class="extention__block">
                                    <div class="extention__item">
                                        <div class="extention__icon"><i class="icon-truck"></i></div>
                                        <div class="extention__content"> <b class="text-black">Free Shipping </b>apply to all orders over <span class="text-success">$100</span></div>
                                    </div>
                                </div>
                                <div class="extention__block">
                                    <div class="extention__item">
                                        <div class="extention__icon"><i class="icon-leaf"></i></div>
                                        <div class="extention__content">Guranteed <b class="text-black">100% Organic </b>from natural farmas </div>
                                    </div>
                                </div>
                                <div class="extention__block">
                                    <div class="extention__item border-none">
                                        <div class="extention__icon"><i class="icon-repeat-one2"></i></div>
                                        <div class="extention__content"> <b class="text-black">1 Day Returns </b>if you change your mind</div>
                                    </div>
                                </div>
                                <div class="extention__block extention__contact">
                                    <p> <span class="text-black">Hotline Order: </span>Free 7:00-21:30</p>
                                    <h4 class="extention__phone">###</h4>
                                    <h4 class="extention__phone">##3</h4>
                                </div>
                                <p class="extention__footer">Become a Vendor? <a href="register.html">Register now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          {{--  --}}
          <div class="container">
            <div class="component__header">
                <h3 class="component__title">Related Product
                </h3>
            </div>
    
            {{-- <div class="component__content"> --}}
                <div class="categories__content">
    
                <div class="categories__products">
    
                <div class="row m-0">
                    @forelse ($relproducts as $relproduct)
                    <div class="col-6 col-md-3 col-lg-3 p-0">
    
                 
                    <div class="ps-flash__product ">
                        <div class="ps-product--standard"><a href="{{ route('product.view',$relproduct->id) }}"><img class="ps-product__thumbnail" src="{{ asset('upload/featured-image/'.$relproduct->photo) }}" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" data-toggle="modal" data-target="#popupQuickview"><i class="icon-expand"></i></a>
                            <div class="ps-product__content">
                                <p class="ps-product__type"><i class="icon-store"></i>{{ $relproduct->brand}}</p>
                                <h5><a class="ps-product__name" href="{{ route('product.view',$relproduct->id) }}">{{ $relproduct->name}}</a></h5>
                                {{-- <p class="ps-product__unit">4 per pack</p> --}}
                                <div class="ps-product__rating">
                                    <select class="rating-stars">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    {{-- <span>(0)</span> --}}
                                </div>
                                <p class="ps-product-price-block"><span class="ps-product__sale">{{ $relproduct->price}}</span><span class="ps-product__price">{{ $relproduct->ori_price}}</span><span class="ps-product__off">{{ $relproduct->discount}}% Off</span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                {{-- <p class="ps-product__sold">Sold: 0/40</p> --}}
                            </div>
                            <div class="ps-product__footer product_data">
                                <input type="hidden" value="{{ $relproduct->id }}" class="product_id">
                                <div class="def-number-input number-input safari_only">
                                    <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                    <input class="quantity input_qty" min="0" name="quantity" value="1" type="number" />
                                    <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                </div>
                    
                                <button class="ps-product__addcart addToCartRel" data-toggle="modal" data-target="#popupAddToCart"><i class="icon-cart"></i>Add to cart</button>
                                {{-- <a class="ps-product__addcart" href="{{ route('add.to.cart', $homeMade->id) }}"><i class="icon-cart"></i>Add to cart</a> --}}
                                <div class="ps-product__box"><a class="ps-product__wishlist" href="wishlist.html">Wishlist</a><a class="ps-product__compare" href="wishlist.html">Compare</a></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    @empty
                    
                    @endforelse
                </div>
                </div>
                </div>
                   
    
                    
               
            {{-- </div> --}}
        </div>
        </section>
       
    </main>
    @include('fronted.content-partial.footer')
    @include('fronted.content-partial.m_foot_cat_nav')

    
    <script>

        $(document).ready(function () {
           $('.addToCart').click(function (e) { 
               e.preventDefault();
               var product_id = $(this).closest('.product_data_single').find('.product_id').val();
               var product_qty = $(this).closest('.product_data_single').find('.input_qty').val();
            //    alert(product_id);
            //    alert(product_qty);
            $.ajaxSetup({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        });
                        console.log(product_qty)
            $.ajax({
                url: '{{URL::to('/add-to-cart')}}',
                type: "POST",
                // url: "add-to-cart",
                data: {'product_id'  :product_id,
                        'product_qty':product_qty,
            },

            success: function (response) {
                    if (response.status!=undefined) {
                        alert(response.status);
                        location.reload();
                    }else{
                        alert(response.login);
                        window.location.href = "http://localhost:8000/user/login";

                    }
                }
            });
               
           });
        });
       </script>
    
    <script>

        $(document).ready(function () {
           $('.addToCartSM').click(function (e) { 
               e.preventDefault();
               var product_id = $(this).closest('.product_data_single').find('.product_id').val();
               var product_qty = $(this).closest('.product_data_single').find('.input_qty').val();

            //    alert(product_id);
            //    alert(product_qty);
            $.ajaxSetup({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        });

            $.ajax({
                url: '{{URL::to('/add-to-cart')}}',
                type: "POST",
                data: {'product_id'  :product_id,
                        'product_qty':product_qty,
            },
            
            success: function (response) {
                    if (response.status!=undefined) {
                        alert(response.status);
                        location.reload();
                    }else{
                        alert(response.login);
                        window.location.href = "http://localhost:8000/user/login";

                    }
                }
            });
            console.log(product_qty)

               
           });
        });
       </script>

<script>
    $(document).ready(function () {
       $('.addToCartRel').click(function (e) { 
           e.preventDefault();
           var product_id = $(this).closest('.product_data').find('.product_id').val();
           var product_qty = $(this).closest('.product_data').find('.input_qty').val();
        $.ajaxSetup({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
        $.ajax({
            type: "POST",
            url: '{{URL::to('/add-to-cart')}}',
            data: {'product_id'  :product_id,
                    'product_qty':product_qty,
        },
            success: function (response) {
                if (response.status!=undefined) {
                    alert(response.status);
                    location.reload();
                }else{
                    alert(response.login);
                    window.location.href = "http://localhost:8000/user/login";

                }
            }

        });
           
       });
    });
   </script>
    @endsection