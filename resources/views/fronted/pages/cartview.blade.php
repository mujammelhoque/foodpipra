@extends('fronted.layout.layout')

@section('content')
    

    <header class="header">
            @include('fronted.content-partial.top&_mobile_header')
            @include('fronted.content-partial.header')
            @include('fronted.content-partial.navbar')
            @include('fronted.content-partial.mobile_search_sidebar')
    </header>
    <main class="no-main">
        <section class="section--shopping-cart">
            <div class="container shopping-container">
                <h2 class="page__title">Shopping Cart</h2>
                <div class="shopping-cart__content">
                    <div class="row m-0">
                        <div class="col-12 col-lg-8">
                            <div class="shopping-cart__products ">
                                <div class="shopping-cart__table">
                                    <div class="shopping-cart-light">
                                        <div class="shopping-cart-row">
                                            <div class="cart-product">Product</div>
                                            <div class="cart-price">Price</div>
                                            <div class="cart-quantity">Quantity</div>
                                            <div class="cart-total">Total</div>
                                            <div class="cart-action"> </div>
                                        </div>
                                    </div>
                                    <div class="shoppng-cart-body ">
                                        @php
                                            $total =0;
                                        @endphp
                                        @forelse ($carts as $cart)
                                        @php
                                            $total+=$cart->products->price*$cart->product_qty;
                                        @endphp
                                            
                                      <input type="hidden" class="update_id" name="update_id[]" value="{{ $cart->id }}">
                                        <div class="shopping-cart-row">
                                            <div class="cart-product">
                                                <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="{{ asset('upload/featured-image/'.$cart->products->photo) }}" alt="alt" /></a>
                                                    <div class="ps-product__content">
                                                        <h5><a class="ps-product__name" href="{{ route('product.view',$cart->product_id) }}">{{ $cart->products->name }}</a></h5>
                                                        <p class="ps-product__unit">{{ $cart->products->weight??"" }}</p>
                                                        <p class="ps-product__soldby">Sold by <span>{{ $cart->products->brand??"" }}</span></p>
                                                        <p class="ps-product__meta">Price: <span class="ps-product__price">{{ $cart->products->price }}/-</span></p>
                                                        <div class="def-number-input number-input safari_only">
                                                            <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                            <input class="quantity" min="0" name="product_qty[]" value="{{ $cart->product_qty }}" type="number" />
                                                            <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                                        </div><span class="ps-product__total">Total: <span>{{ $cart->products->price*$cart->product_qty }} /-</span></span>
                                                    </div>
                                                    <div class="ps-product__remove  "> <a  href="{{ url('delete-cart-item/'.$cart->id) }}"><i class="icon-trash2"></i></a></div>
                                                </div>
                                            </div>
                                            <div class="cart-price"><span class="ps-product__price">{{ $cart->products->price}}/-</span>
                                            </div>
                                            <div class="cart-quantity">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="m_product_qty" value="{{ $cart->product_qty }}" type="number" />
                                                    <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="cart-total"> <span class="ps-product__total">{{ $cart->products->price*$cart->product_qty }}/- </span>
                                            </div>
                                            <div class="cart-action"><a href="{{ url('delete-cart-item/'.$cart->id) }}"><i class="icon-trash2"></i></a> </div>
                                        </div>

                                        @empty
                                            
                                        @endforelse
                                        
                                        
                                    </div>
                                </div>
                                <div class="shopping-cart__step"><a class="clear-item" href="javascript:void(0);">Clear all items</a><a class="button right updateCart" href="javascript:void(0);"><i class="icon-sync"> </i>Update Cart</a><a class="button left" href="{{ route('/') }}"><i class="icon-arrow-left"></i>Continue Shopping</a></div>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="shopping-cart__block">
                                            <h3 class="block__title">Using A Promo Code?</h3>
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="Coupon code">
                                                <div class="input-group-append">
                                                    <button class="btn">Apply</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="shopping-cart__block">
                                            <h3 class="block__title">Calculate Shipping</h3>
                                            <div class="input-group">
                                                <select class="single-select2" name="state">
                                                    <option value="uk">Dhaka City</option>
                                                    {{-- <option value="vn">O Nam</option> --}}
                                                </select>
                                            </div>
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="Town/ City">
                                            </div>
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="Postcode/ ZIP">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="shopping-cart__right">
                                <div class="shopping-cart__total">
                                    <p class="shopping-cart__subtotal"><span>Total before Servie Charge</span><span class="price">tk {{ $total }}/-</span></p>
                                    <p class="shopping-cart__shipping">Shipping cost<br><span>80tk</span><br>Estimate for <b>Dhaka City</b></p>
                                    <p class="shopping-cart__subtotal"><span><b>Gross TOTAL</b></span><span class="price-total">{{ $total }}/-</span></p>
                                </div><a class="btn shopping-cart__checkout" href="{{ route('billing.address') }}">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('fronted.content-partial.footer')
    @include('fronted.content-partial.m_foot_cat_nav')
  

    @endsection
    
    @section('scripts')
    
    <script>

        $(document).ready(function () {
           $('.updateCart').click(function (e) { 
               e.preventDefault();
               var cart_id = $('input[name="update_id[]"]').map(function () {
            return this.value; // $(this).val()
            }).get();

               var product_qty = $('input[name="product_qty[]"]').map(function () {
            return this.value; // $(this).val()
            }).get();

               var m_product_qty = $('input[name="m_product_qty[]"]').map(function () {
            return this.value; // $(this).val()
            }).get();
     
         
            $.ajaxSetup({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        });
            $.ajax({
                type: "POST",
                url: "update-to-cart",
                data: {'cart_id'  :cart_id,
                        'product_qty':product_qty,
                        'm_product_qty':m_product_qty,
            },
                success: function (response) {
                    alert(response.status);
                }
            });
               
           });
        });
       </script>
       
      

    
    @endsection