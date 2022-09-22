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

    <section class="ps-component ps-component--category">
        <div class="container">
            <div class="component__header">
                <h3 class="component__title">All of Brand</h3>
            </div>

            <div class="row">
                @forelse ($shop_logo as $shop)

                <div class="col-sm-4 col-md-3 col-lg-3">
                    <div class="ps-category__item " style="" >
                        <img style="height:150px;" class="card-img-top " src="{{ asset('upload/shop-img/'.$shop->shop_logo) }}" alt="shop logo">
                        <div class="card-body">
                          <h4 class="card-title">{{$shop->shop_name }}</h4>
                          {{-- <p class="card-text">Some example text.</p> --}}
                          <a href="{{ route('all.product.byshop',$shop->id) }}" class="btn btn-primary">Show product</a>
                        </div>
                      </div>
                </div>
                @empty
                        
                @endforelse

            </div>

              
            <div class="d-flex justify-content-center">
                {!! $shop_logo->links() !!}
              </div>
        </div>
    </section>
    
</main>
@include('fronted.content-partial.footer')
@include('fronted.content-partial.m_foot_cat_nav')

@endsection