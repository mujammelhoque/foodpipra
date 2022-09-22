@foreach($childs as $child)
<li><a href="{{ route('subcategory.all',$child->id) }}">{{ $child->name }}</a></li>
          @if(count($child->childs))
          <ul> 
            <li><a href="{{ route('subcategory.all',$child->id) }}">{{ $child->name }}</a></li>
                     @include('fronted.content-partial.manageChildMobile',['childs' => $child->childs])
             </ul>
     
                 @endif
         
                </li>
         @endforeach
