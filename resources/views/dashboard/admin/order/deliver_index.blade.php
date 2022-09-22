@extends('dashboard.admin.layout.layout')
@section('content')
<div class="container">
  @include('common.message.message')
<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Products</h3>
      <div class="card-tools">
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
          <th>Email</th>
          <th>Phone</th>
          <th>Payment</th>
          <th>Transaction id</th>
          <th>Total Amount</th>
          <th>status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @forelse ($orders as $order)
              <tr>
                <td>
                  {{ $order->full_name }}
                </td>

                <td>
                    {{ $order->email }}
                </td>
                <td>
                    {{ $order->phone }}
                </td>

                <td>
                    {{ $order->phone }}
                </td>
                <td>
                    {{ $order->phone }}
                </td>

                <td>
                    {{ $order->phone }}
                </td>
              
                <td>
                    {{ $order->position }}
                </td>


                <td>
                  <form action="{{ route('admin.product.destroy',$order->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('admin.order.view.deliver',$order->id) }}">view</a> 
                    @csrf
                    @method('DELETE')
                    <button Onclick="return ConfirmDelete()" type="submit" class="btn btn-outline-danger">Delete</button>
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
 
  </div>
     <div class="d-flex justify-content-center">
      {!! $orders->links() !!}
    </div>
  <!-- /.card -->
</div>
@endsection
