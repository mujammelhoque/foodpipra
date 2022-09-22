<ul class="list-group mt-2">
    @foreach($childs as $child)
    <li class="list-group-item mt-2 mb-2 bg-light">
         <div class="d-flex justify-content-between"> 
          <div>{{ $child->location }} &nbsp;&nbsp;/ <span class="text-primary">shipping cost </span>&nbsp; {{ $child->shipping_cost }}tk</div>  
            <div class="button-group d-flex">
                <button  type="button" class="btn btn-primary edit-category" data-toggle="modal" data-target="#exampleModal" data-id="{{ $child->id }}" data-name="{{ $child->location }}">Edit</button>&nbsp;

                <form action="{{ route('admin.location.destroy', $child->id) }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <button type="submit" Onclick="return ConfirmDelete();" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </div>
              </div>
              @if(count($child->childs))
              <ul> 
                  <li class="mb-2 bg-light">
                         @include('back-end.location.manageChild',['childs' => $child->childs])
                     </li>
                 </ul>
         
                     @endif
             
                    </li>
             @endforeach

   
    </ul>


                          

                      