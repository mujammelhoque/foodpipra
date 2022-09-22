@extends('dashboard.seller.layout.layout')
@section('page-content')
  @include('common.message.message')
  <div class="card-body">
    <div class="table-responsive">

      <table class="table table-striped text-center ">
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
                  <img src="{{ asset('upload/featured-image/'.$product->photo) }}" alt="image 1" style="width: 100px" class="rounded-circle">
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
                  <form action="{{ route('seller.product.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('seller.product.edit',$product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button Onclick="return ConfirmDelete()" type="submit" class="btn btn-outline-danger">Delete</button>
                    <a class="btn btn-info" href="{{ route('seller.product.show',$product->id) }}">Show</a> 
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

@endsection
