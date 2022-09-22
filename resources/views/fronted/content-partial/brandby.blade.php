<section class="ps-component ps-component--category">
    <div class="container">
        <div class="component__header">
            <h3 class="component__title">Shop By Brand</h3>
        </div>
        <div class="component__content">
            <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="8" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="5" data-owl-item-lg="8" data-owl-duration="1000" data-owl-mousedrag="on">
                @forelse ($brands as $brand)
                @if ($brand->image == null)
                @continue
            @endif
                    
                <div class="ps-category__item"><a href="shop-categories.html"><img class="ps-categories__thumbnail" src="{{ asset('upload/brand-image/'.$brand->image) }}" alt=""></a><a class="ps-categories__name" href="shop-categories.html">{{$brand->name }} </a></div>
                @empty
                    
                @endforelse

      
            </div>
            </div>
        <div class="text-right">
                    <a class="component__view" href="{{ route('brand.all.logo') }}">View all <i class="icon-chevron-right"></i></a>

    </div>
    </div>
</section>