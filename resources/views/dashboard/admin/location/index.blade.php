@extends('dashboard.admin.layout.layout')
@section('style')
<style>
li{
list-style-type: none;
}
</style>

@endsection
@section('content')

{{-- alert .start --}}
<script>
function ConfirmDelete()
{
var x = confirm("Are you sure you want to delete?");
if (x)
    return true;
else
  return false;
}
</script>    
{{-- alert .end --}}

    @if (Session::has('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Error!</h4>
            <p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </p>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

      <div class="container py-3">
        <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Location</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
            <form action="" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" name="location" class="form-control" id="editCategoryModal" required>
                  </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
              </form>
        </div>
      </div>
    </div>
  </div>
        <div class="container">

      <div class="row">
        <div class="col-md-8">

          <div class="card bg-primary">
            <div class="card-header">
              <h3>Locations</h3>
            </div>
            <div class="card-body bg-light">
              <ul class="list-group ">
                @foreach ($locations as $location)
                  <li   class="list-group-item">
                      <div class="d-flex justify-content-between"> 
                        <div class="bg-success  w-100"> <span class="text-light"><strong> &nbsp;{{ $location->location }} </strong> &nbsp; </span> &nbsp;&nbsp;/ <span class="text-dark">shipping cost </span>&nbsp; {{ $location->shipping_cost }}tk</div>&nbsp;  
                          <div class="button-group d-flex">
                           
                              <button type="button" class="btn btn-primary edit-category" data-toggle="modal" data-target="#exampleModal" data-id="{{ $location->id }}" data-name="{{ $location->location }}">Edit</button>&nbsp;
              
                              <form action="{{ route('admin.location.destroy', $location->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
              
                                <button  type="submit" Onclick="return ConfirmDelete();" class="btn btn-sm btn-danger">Delete</button>
                              </form>
                            </div>
                            </div>
                      {{-- childs start--}}
                                @if(count($location->childs))
                                    @include('dashboard.admin.location.manageChild',['childs' => $location->childs])
                                    
                                @endif
                    {{-- childs end--}}

                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        

        <div class="col-md-4">
          <div class="card bg-primary">
            <div class="card-header">
              <h3>Create Location</h3>
            </div>

            <div class="card-body">
              <form action="{{ route('admin.location.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <select class="form-control" name="parent_id">
                    <option value="">Select Parent Location</option>

                    @foreach ($all_locations as $location)
                      <option value="{{ $location->id }}">{{ $location->location }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group mt-2">
                  <input type="text" name="location" class="form-control" value="{{ old('location') }}" required placeholder="Main/Sub location">
                </div>
                <div class="form-group mt-2">
                  <input type="number" name="shipping_cost" class="form-control" value="{{ old('shipping_cost') }}" placeholder="Shipping Cost">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-secondary mt-2">Create</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
   
 

    <script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>

    <script type="text/javascript">
      $('.edit-category').on('click', function() {
        var id = $(this).data('id');
        var location = $(this).data('location');
        var url = "{{ url('editlocation')}}/"+ id;

        $('#exampleModal form').attr('action', url);
        $('#exampleModal form input[name="location"]').val(location);
      });
    </script>

  
@endsection
