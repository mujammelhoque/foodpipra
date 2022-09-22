@extends('dashboard.admin.layout.layout')
@section('content')
<div class="container">
  @include('common.message.message')
<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Products</h3>
      <div class="card-tools">
        <a class="btn-sm btn-success" href="{{ route('admin.product.create') }}">Add New</a>
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
          <th>Name</th>
          <th>Picture</th>
          <th>Category</th>
          <th>Sub Category</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @forelse ($products as $product)
              <tr>
                <td>
                  {{ $product->name }}
                </td>

                <td>
                  <img src="{{ asset('upload/featured-image/'.$product->photo) }}" alt="Product 1" class="img-circle img-size-64 mr-2">
                </td>

                <td>
                  {{ $product->cat_info['name'] }}
                </td>

                <td>
                  {{ $product->sub_cat_info['name'] ??""}}
                </td>

                <td>
                  {{ $product->price }}
                </td>

                <td>
                  {{ $product->stock }}
                </td>

                <td>
                  <form action="{{ route('admin.product.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('admin.product.edit',$product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button Onclick="return ConfirmDelete()" type="submit" class="btn btn-outline-danger">Delete</button>
                    <a class="btn btn-info" href="{{ route('admin.product.show',$product->id) }}">Show</a> 
                  </form>
                </td>

              </tr>
          @empty
          <tr>
            <td colspan="6">     <h4>No Product Available</h4></td>
          </tr>
          @endforelse

        </tbody>
      </table>
    </div>
    <div class="d-flex justify-content-center">
      {!! $products->links() !!}
    </div>
  </div>
  <!-- /.card -->
</div>
@endsection
