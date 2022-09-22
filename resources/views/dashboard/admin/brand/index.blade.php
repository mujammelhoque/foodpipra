@extends('dashboard.admin.layout.layout')
@section('content')
<div class="container">
  @include('common.message.message')
<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Products</h3>
      <div class="card-tools">
        <a class="btn-sm btn-success" href="{{ route('admin.brand.create') }}">Add New</a>
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
          <th>Name</th>
          <th>status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @forelse ($brands as $brand)
              <tr>

                <td>
                  <img src="{{ asset('upload/brand-image/'.$brand->image) }}" alt="Product 1" class="img-circle img-size-64 mr-2">
                </td>
                <td>
                  {{ $brand->name }}
                </td>
                <td>
                  {{ $brand->status }}
                </td>
              
                <td>
                  <form action="{{ route('admin.brand.destroy',$brand->id) }}" method="POST">
                    <a class="btn btn-sm btn-primary" href="#">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button Onclick="return ConfirmDelete()" type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    <a class="btn btn-sm btn-info" href="#">Show</a> 
                  </form>
                </td>

              </tr>
          @empty
          <tr>
            <td colspan="6">     <h4>No Brand Available</h4></td>
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
