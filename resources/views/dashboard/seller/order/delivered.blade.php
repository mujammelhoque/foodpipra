@extends('dashboard.seller.layout.layout')
@section('page-content')
  @include('common.message.message')
<div class="card">

  <div class="card-body">
    <div class="table-responsive">

      <table class="table table-striped text-center ">
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
                    {{ $order->payment_method }}
                </td>
                <td>
                    {{ $order->txn_id }}
                </td>

                <td>
                    {{ $order->total_amount }}
                </td>
              
                <td>
                    {{ $order->position }}
                </td>


                <td>
                  <form action="{{ route('seller.product.destroy',$order->id) }}" method="POST">
                    {{-- <a class="btn btn-info" href="{{ route('seller.order.view',$order->id) }}">view</a>  --}}
                    @csrf
                    @method('DELETE')
                    <button Onclick="return ConfirmDelete()" type="submit" class="btn btn-outline-danger">Delete</button>
                  </form>
                </td>

              </tr>
          @empty
          <tr>
            <td colspan="8">     <h4>No Product Available</h4></td>
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
