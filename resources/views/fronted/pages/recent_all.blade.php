@extends('fronted.layout.layout')
@section('content')
        @include('common.message.message')
<header class="header ps-header--dark">
        @include('fronted.content-partial.top&_mobile_header')
        @include('fronted.content-partial.header')
        @include('fronted.content-partial.navbar')
        @include('fronted.content-partial.mobile_search_sidebar')
</header>

<main class="no-main ps-home--dark">
    <section class="section-categories--default">
        <div class="container">
            {{-- <div class="categories--floating"><a class="floating-item" href="#freshFoodBlock"><i class="icon-apple"></i></a><a class="floating-item" href="#foodCupboardBlock"><i class="icon-ice-cream2"></i></a><a class="floating-item" href="#readyMealBlock"><i class="icon-platter"></i></a><a class="floating-item" href="#drinkTeaBlock"><i class="icon-glass2"></i></a><a class="floating-item" href="#kitchenBlock"><i class="icon-dinner"></i></a>
            </div> --}}
            <div class="categories--block">
                <h3><a class="categories__title" id="freshFoodBlock">More View</a></h3>
                <div class="categories__content">

                    <div class="categories__products">
                        <div class="row m-0">

                            @forelse ($productall as $item)
                                
                          
                            <div class="col-6 col-md-4 col-lg-3 p-0">
                                <div class="ps-product--standard"><a href="{{ route('product.view',$item->product->id) }}"><img class="ps-product__thumbnail" src="{{ asset('upload/featured-image/'.$item->product->photo) }}" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" data-toggle="modal" data-target="#popupQuickview"><i class="icon-expand"></i></a>
                                    <div class="ps-product__content">
                                        <p class="ps-product__type"><i class="icon-store"></i>{{ $item->product->brand}}</p>
                                        <h5><a class="ps-product__name" href="{{ route('product.view',$item->product->id) }}">{{ $item->product->name}}</a></h5>
                                        <p class="ps-product__unit">{{ $item->product->weight}}</p>
                                        <div class="ps-product__rating">
                                            <select class="rating-stars">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select><span>(0)</span>
                                        </div>
                                        <p class="ps-product-price-block"><span class="ps-product__price-default">{{ $item->product->price}}</span>
                                        </p>
                                    </div>
                                    <div class="ps-product__footer product_data">
                                        <input type="hidden" value="{{ $item->product->id }}" class="product_id">

                                        <div class="def-number-input number-input safari_only">
                                            <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                            <input class="quantity input_qty" min="0" name="quantity" value="1" type="number" />
                                            <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                        </div>
                                        <div class="ps-product__total">Total: <span>$4.49</span>
                                        </div>
                                        <button class="ps-product__addcart addToCart" data-toggle="modal" data-target="#popupAddToCart"><i class="icon-cart"></i>Add to cart</button>
                                        <div class="ps-product__box"><a class="ps-product__wishlist" href="#">Wishlist</a><a class="ps-product__compare" href="#">Compare</a></div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                
                            @endforelse
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
           
     
        
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            {!! $productall->links() !!}
          </div>
    </section>

    
    <script>
        $(document).ready(function () {
           $('.addToCart').click(function (e) { 
               e.preventDefault();
   
               var product_id = $(this).closest('.product_data').find('.product_id').val();
               var product_qty = $(this).closest('.product_data').find('.input_qty').val();
            //    alert(product_id);
            //    alert(product_qty);
            $.ajaxSetup({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        });
            $.ajax({
                type: "POST",
                url: "add-to-cart",
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
    
    
</main>
@include('fronted.content-partial.footer')
@include('fronted.content-partial.m_foot_cat_nav')

@endsection