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
          
            <div class="categories--block">
                <h3><a class="categories__title" id="freshFoodBlock">{{ "All Of"." ".$viewname??"More View" }}</a></h3>
                <div class="categories__content">

                    <div class="categories__products">
                        <div class="row ">

                            @forelse ($products as $product)
                                
                          
                            <div class="col-6 col-md-4 col-lg-3 " style="border-style: ridge">
                                <div class="ps-product--standard"><a href="{{ route('product.view',$product->id) }}"><img class="ps-product__thumbnail" src="{{ asset('upload/featured-image/'.$product->photo) }}" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" data-toggle="modal" data-target="#popupQuickview"><i class="icon-expand"></i></a>
                                    <div class="ps-product__content">
                                        <p class="ps-product__type"><i class="icon-store"></i>{{ $product->brand}}</p>
                                        <h5><a class="ps-product__name" href="{{ route('product.view',$product->id) }}">{{ $product->name}}</a></h5>
                                        <p class="ps-product__unit">{{ $product->weight}}</p>
                                      
                                        <p class="ps-product-price-block"><span class="ps-product__price-default">{{ $product->price}}tk</span>
                                        </p>
                                    </div>
                                    <div class="ps-product__footer product_data">
                                        <input type="hidden" value="{{ $product->id }}" class="product_id">

                                        <div class="def-number-input number-input safari_only">
                                            <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                            <input class="quantity input_qty" min="0" name="quantity" value="1" type="number" />
                                            <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
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
            {!! $products->links() !!}
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