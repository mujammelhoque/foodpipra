@extends('fronted.layout.layout')
@section('content')
     <header class="header">
        @include('fronted.content-partial.top&_mobile_header')
        @include('fronted.content-partial.header')
        @include('fronted.content-partial.navbar')
        @include('fronted.content-partial.mobile_search_sidebar')
        
    </header>
    <main class="no-main">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="ps-breadcrumb__list">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li class="active"><a href="shop.html">Shop</a></li>
                    <li><a href="javascript:void(0);">Checkout</a></li>
                </ul>
            </div>
        </div>
        <section class="section--checkout">
            <div class="container">
                <h2 class="">Checkout</h2>
                <div class="checkout__content">
                    <div class="checkout__header">
                        <div class="row">
                            <div class="col-12 col-lg-7">
                                <div class="checkout__header__box">
                                    <p><i class="icon-user"></i>Returning customer? <a href="#">Click here to login</a></p><i class="icon-chevron-down"></i>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5">
                                <div class="checkout__header__box">
                                    <p><i class="icon-tags"></i>Have a coupon? <a href="#">Click here to renter your code</a></p><i class="icon-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-7">
                            <h3 class="checkout__title">Billing Details</h3>
                            <div class="checkout__form">
                                <form action="{{ route('order.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">

                                        <div class="col-12 col-lg-6 form-group--block">
                                            <label>Full Name: <span>*</span></label>
                                            <input class="form-control" name="full_name" type="text" value="{{ auth()->user()->name }}" required>
                                        </div>
                                        <div class="col-12 col-lg-6 form-group--block">
                                            <label>Email<span>*</span></label>
                                            <input class="form-control " type="email" name="email" value="{{ auth()->user()->email}}" required>
                                        </div>

                                        <div class="col-12 col-lg-6 form-group--block">
                                            <label>District <span>*</span></label>
                                            {{-- <input class="form-control" name="district" type="text" required> --}}
                                            <select class="form-control" style="font-size:20px;" id="location" name="location_id" >
                                                <option disabled value="" selected>select one</option>
                                                @forelse ($locations as $location)
                                                <option value="{{ $location->id }}" class="text-info">{{ $location->location }}</option>
                                                    
                                                @empty
                                                    
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-6 form-group--block">
                                            <label>Sub District<span>*</span></label>
                                            <select class="form-control" id="subLocation" style=" font-size:20px;"  name="sublocation_id">
                                           
                                            </select>
                                            {{-- <input class="form-control " name="sub_district" type="text" required> --}}
                                        </div>
                                        <div id="shippingCostInput">  </div>
                                        <div id="allTotal">  </div>

                                        <div class="col-12 form-group--block">
                                            <label> address: <span>*</span></label>
                                            <textarea name="address1" class="form-control"  cols="4" rows="3"> {{ auth()->user()->address }} </textarea>
                                       
                                        </div>
                                        {{-- <div class="col-12 form-group--block">
                                            <label>address 2: <small>(optional)</small></label>
                                            <input class="form-control" type="text" name="address2" placeholder="House number and street name">
                                        </div> --}}

                                     
                                   
                                        <div class="col-12 form-group--block">
                                            <label>Phone: <span>*</span></label>
                                            <input class="form-control" name="phone" value="{{ auth()->user()->phone }}" type="text" required>
                                        </div>
                                        
                                        <div class="col-12 form-group--block">
                                            <label>Payment: <span>*</span></label>
                                            <select name="payment_method" class="form-control" required>
                                                <option selected value="cash-on">Cash on</option>
                                                <option value="rocket">Rocket</option>
                                                <option value="bkash">Bkash</option>
                                                <option value="nogad">Nogad</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-12 form-group--block">
                                            <label>Transaction Id:</label>
                                            <input class="form-control" name="txn_id" type="text" >
                                        </div>
                                        
                                        <div class="col-12 form-group--block mt-3">
                                            <button type="submit" class="btn checkout__order">Place an order</button>
                                        </div>
                                      
                                    
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <h3 class="checkout__title">Your Order</h3>
                            <div class="checkout__products">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="checkout__label">PRODUCT</div>
                                    </div>
                                    <div class="col-4 text-right">
                                        <div class="checkout__label">TOTAL</div>
                                    </div>
                                </div>
                                <div class="checkout__list">
                                    @php $total = 0;
                                     @endphp
                                        @foreach($carts as $cart)
                                        @php $total += $cart->products->price * $cart->product_qty @endphp
                                    <div class="checkout__product__item">
                                        <div class="checkout-product">
                                            <div class="product__name">{{ $cart->products->name}}<span>(x{{ $cart->product_qty }})</span></div>
                                            <div class="product__unit">{{ $cart->products->weight}}</div>
                                        </div>
                                        <div class="checkout-price">{{ $cart->products->price * $cart->product_qty }}/-</div>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="checkout__label">Total</div>
                                    </div>
                                    <div class="col-4 text-right">
                                        <div class="checkout__label"> {{ $total }}</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="checkout__label">Shipping</div>
                                <p id="shippingCostShow"> </p>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="checkout__total">Total</div>
                                    </div>
                                    <div class="col-4 text-right">
                                        <div class="checkout__money" >
                                            <div id="totalWithShipping">
                                            </div>
                                            {{-- {{ $total+80 }}/- --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                            <div class="form-group--block">
                                <input class="form-check-input" type="checkbox" id="checkboxAgree" value="agree">
                                {{-- <label class="label-checkbox" for="checkboxAgree"><b class="text-heading">I have read and agree to the website
                      <u class="text-success">terms and conditions  </u><span>*</span></b></label> --}}
                            {{-- </div><a class="checkout__order" href="order-tracking.html">Place an order</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
  <script type=text/javascript>
    $(document).ready(function(){
      $('#location').change(function(){
      var locationId = $(this).val();  
      if(locationId){
        $.ajax({
          type:"GET",
        //   url: '{{URL::to('user/getSublocation')}}'?location_id="+locationId,

          url:"{{url('getSublocation')}}?location_id="+locationId,
          success:function(res){        
          if(res){
            $("#subLocation").empty();
            $("#subLocation").append('<option>Select Sub a location</option>');
            $.each(res,function(key,value){
              $("#subLocation").append('<option value="'+key+'">'+value+'</option>');
            });
          
          }
          else{
            $("#subLocation").empty();
          }
          }
        });
      }else{
        $("#subLocation").empty();

   
      }   
      });

      $('#subLocation').change(function(){
      var sublocationId = $(this).val();  
      if(sublocationId){
        $.ajax({
          type:"GET",
          url:"{{url('getSublocationShippingCost')}}?subLocation_id="+sublocationId,
          success:function(res){        
          if(res){
            $("#shippingCostInput").empty();
            $("#allTotal").empty();
            $("#totalWithShipping").empty();
            $("#shippingCostShow").empty();
            $.each(res,function(key,value){
                
                $("#shippingCostInput").append($('<input name="ship_cost" type="hidden" value="'+value+'">'));
                $("#shippingCostShow").append($('<em style="color:blue" > Shipping Cost:</em> <span style="color:green; font-weight:bold">'+value+' </span>'));
                var test =value;
                test+={{ $total }};
                
                $("#allTotal").append($('<input name="total" type="hidden" value="'+test+'">'));
            $("#totalWithShipping").append($('<span> '+test+' </span>'));
            // test = 0;
        });
          
          }
        //   else{
        //     $("#totalWithShipping").empty();
        //   }
          }
        });
      }
    //   else{
    //     $("#totalWithShipping").empty();

   
    //   }   
      });

    }); 
    </script>
    </main>
    @include('fronted.content-partial.footer')
    @include('fronted.content-partial.m_foot_cat_nav')
    @endsection
