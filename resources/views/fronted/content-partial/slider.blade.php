<div class="section-slide--default">
    <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">

        @forelse ($sliders as $slider)
            
        <div class="ps-banner">
            <img class="mobile-only" src="{{ asset('upload/slider-image/'.$slider->image) }}" alt="alt" />
            <img class="desktop-only" src="{{ asset('upload/slider-image/'.$slider->image) }}" alt="alt" />
            <div class="ps-content">
                <div class="container">
                    <div class="ps-content-box">
                        <div class="ps-node">{{  $slider->title1 }}</div>
                        <div class="ps-title">{{ $slider->title1 }}</div>
                        <div class="ps-subtitle">{{ $slider->title1 }}</div>
                        <div class="ps-shopnow"> <a href="#">Shop Now<i class="icon-chevron-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            
        @endforelse
        
    </div>
</div>