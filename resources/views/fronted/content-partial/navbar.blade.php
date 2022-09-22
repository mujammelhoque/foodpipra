
    <nav class="navigation">
        <div class="container">
            <ul class="menu">

                <li class="menu-item-has-children has-mega-menu active"><a class="nav-link active" href="{{ route('/') }}">Home</a>
                </li>
{{--  --}}
@forelse ($categories as $category)
    

                <li class="menu-item-has-children has-mega-menu"><a class="nav-link" href="{{ route('category.all',$category->id) }}">{{ $category->name }}</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                    <div class="mega-menu mega-shop">
                        <div class="mega-anchor"></div>
                        <div class="mega-menu__column">
                            <h4>Click one<span class="sub-toggle"></span></h4>

                            <ul class="sub-menu--mega">
                            {{-- childs start--}}
                                         @if(count($category->childs))
                                         @include('fronted.content-partial.manageChild',['childs' => $category->childs])
                                         
                                     @endif
                         {{-- childs end--}}
                            </ul>
                        </div>
                    </div>
                </li>
                 @empty
              no category found
             @endforelse
                {{--  --}}
            </ul>
        </div>
    </nav>