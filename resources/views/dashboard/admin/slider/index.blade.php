@extends('dashboard.admin.layout.layout')
@section('content')
<div class="container">
  @include('common.message.message')
<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Products</h3>
      <div class="card-tools">
        <a class="btn-sm btn-success" href="{{ route('admin.slider.create') }}">Add New</a>
        <a href="#" class="btn btn-tool btn-sm">
          <i class="fas fa-download"></i>
        </a>
        <a href="#" class="btn btn-tool btn-sm">
          <i class="fas fa-bars"></i>
        </a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-striped table-valign-middle">
        <thead>
        <tr>
          <th>Image</th>
          <th>title 1</th>
          <th>title 2 </th>
          <th>Title 3</th>
          <th>status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @forelse ($sliders as $slider)
              <tr>

                <td>
                  <img src="{{ asset('upload/slider-image/'.$slider->image) }}" alt="Product 1" class="img-circle img-size-64 mr-2">
                </td>
                <td>
                  {{ $slider->title1 }}
                </td>
                <td>
                  {{ $slider->title2 }}
                </td>
                <td>
                  {{ $slider->title3 }}
                </td>
                <td>
                  {{ $slider->status }}
                </td>

                

                <td>
                  <form action="{{ route('admin.slider.destroy',$slider->id) }}" method="POST">
                    <a class="btn btn-primary" href="">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button Onclick="return ConfirmDelete()" type="submit" class="btn btn-outline-danger">Delete</button>
                    <a class="btn btn-info" href="">Show</a> 
                  </form>
                </td>

              </tr>
          @empty
          <tr>
            <td colspan="6">     <h4>No Slider Available</h4></td>
          </tr>
         
          @endforelse

        </tbody>
      </table>
    </div>
  </div>
  <!-- /.card -->
</div>
</div>
@endsection
