<section class="ps-component ps-component--flash">
    <div class="container">
        <div class="component__header">
            <h3 class="component__title">New Arrival
            </h3>
        </div>

        {{-- <div class="component__content"> --}}
            <div class="categories__content">

            <div class="categories__products">

            <div class="row m-0">
                @forelse ($newarrivals as $new)
                <div class="col-6 col-md-3 col-lg-2 p-0">

             
                <div class="ps-flash__product ">
                    <div class="ps-product--standard"><a href="{{ route('product.view',$new->id) }}"><img class="ps-product__thumbnail" src="{{ asset('upload/featured-image/'.$new->photo) }}" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" data-toggle="modal" data-target="#popupQuickview"><i class="icon-expand"></i></a>
                        <div class="ps-product__content">
                            <p class="ps-product__type"><i class="icon-store"></i>{{ $new->brand}}</p>
                            <h5><a class="ps-product__name" href="{{ route('product.view',$new->id) }}">{{ $new->name}}</a></h5>
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
                            <p class="ps-product-price-block"><span class="ps-product__sale">{{ $new->price}}</span><span class="ps-product__price">{{ $new->ori_price}}</span><span class="ps-product__off">{{ $new->discount}}% Off</span>
                            </p>
                            {{-- <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> --}}
                            {{-- <p class="ps-product__sold">Sold: 0/40</p> --}}
                        </div>
                        <div class="ps-product__footer product_data">
                            <input type="hidden" value="{{ $new->id }}" class="product_id">
                            <div class="def-number-input number-input safari_only">
                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                <input class="quantity input_qty" min="0" name="quantity" value="1" type="number" />
                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                            </div>
                
                            <button class="ps-product__addcart addToCart" data-toggle="modal" data-target="#popupAddToCart"><i class="icon-cart"></i>Add to cart</button>
                            {{-- <a class="ps-product__addcart" href="{{ route('add.to.cart', $homeMade->id) }}"><i class="icon-cart"></i>Add to cart</a> --}}
                            {{-- <div class="ps-product__box"><a class="ps-product__wishlist" href="wishlist.html">Wishlist</a><a class="ps-product__compare" href="wishlist.html">Compare</a></div> --}}
                        </div>
                    </div>
                </div>
                </div>
                @empty
                
                @endforelse
            </div>
            </div>
            </div>
               

                
            <div class="text-right">
                <a class="component__view" href="{{ route('new.all') }}">View all <i class="icon-chevron-right"></i></a>
            </div>
        {{-- </div> --}}
    </div>
    
    <script>
        $(document).ready(function () {
           $('.addToCart').click(function (e) { 
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
       
</section>