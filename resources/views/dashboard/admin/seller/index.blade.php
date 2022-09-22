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
          <th>Shop Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Shop Logo</th>
          <th>Address</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @forelse ($sellers as $seller)
              <tr>
                <td>
                  {{ $seller->name }}
                </td>
                <td>
                  {{ $seller->shop_name }}
                </td>
                <td>
                  {{ $seller->phone }}
                </td>
                <td>
                  {{ $seller->email }}
                </td>
                <td>
                  {{ $seller->address }}
                </td>
                @if ($seller->seller_rule==0)
                <td class="text-info">
                  General
                </td>
                  @else
                  <td class="text-warning">
                  Seller Admin
                </td>
                      
                  @endif

                <td>
                  <img src="{{ asset('upload/shop-img/'.$seller->shop_logo) }}" alt="shop image" class="img-circle img-size-64 mr-2">
                </td>

                <td>
                  <form action="{{ route('admin.seller.rule.change',$seller->id) }}" method="POST">
                    @csrf
                  <select class="form-control" name="seller_rule" >
                    <option value="0">General</option>
                    <option value="1">Seller Admin</option>
                  </select>
                  <button class="btn btn-sm bg-info" type="submit"> Change</button>
                </form>
                </td>

                {{-- <td>

                  <form action="{{ route('admin.product.destroy',$seller->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('admin.seller.edit',$seller->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button disabled Onclick="return ConfirmDelete()" type="submit" class="btn btn-outline-danger">Delete</button>
                    <a class="btn btn-info" href="{{ route('admin.seller.show',$seller->id) }}">Show</a> 
                  </form>
                </td> --}}

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
      {!! $sellers->links() !!}
    </div>
  </div>
  <!-- /.card -->
</div>
@endsection
