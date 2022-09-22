@extends('dashboard.seller.layout.layout')
@section('style')
<style>
/* {{-- body{

  background-color: #000;
} --}} */

.padding{

  padding: 1rem !important;
}

.card {
    margin-bottom: 30px;
    border: none;
    -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #e6e6f2;
}

h3 {
    font-size: 20px;
}

h5 {
    font-size: 15px;
    line-height: 26px;
    color: #3d405c;
    margin: 0px 0px 15px 0px;
    font-family: 'Circular Std Medium';
}

.text-dark {
    color: #3d405c !important;
}
</style>
@endsection
@section('page-content')
 <div>
   
  
 </div>
<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
  {{-- <form  action="{{ route('order.position') }}" method="post">
    @csrf
    <input type="hidden" name="change_id" value="{{ $order->id }}">
    <select name="change_position" class="form-control">
      <option value="" disabled selected>change the status</option>
      <option value="delivered">Delivered</option>
      <option value="cancel">Cancel</option>
    </select>
    <button type="submit" class="btn btn-sm bg-primary mt-2">change</button>
  </form>
  <br> --}}
  @if ($order->position == 'delivered')
  <a class="btn btn-success btn-sm" href="{{ route('seller.deliver.order.pdf',$order->id) }}">Download</a>

  @endif
  <div class="card">
  <div class="card-header p-4">
  <a class="pt-2 d-inline-block" href="index.html" data-abc="true">foodpipra.com</a>
  <div class="float-right"> <h3 class="mb-0">#{{ $order->invoice }}</h3>
    {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</div>
  </div>
  <div class="card-body">
  <div class="row mb-4">
  <div class="col-sm-6">
  <h5 class="mb-3">From:</h5>
  <h3 class="text-dark mb-1">Food Pipra</h3>
  <div>Konapara, Jatrabri, dhaka</div>
  {{-- <div>Sikeston,New Delhi 110034</div> --}}
  <div>Email: mahfujmazumder@gmail.com</div>
  <div>Phone: +880 1628-528132</div>
  </div>
  <div class="col-sm-6 ">
  <h5 class="mb-3">To:</h5>
  <h3 class="text-dark mb-1">{{ $order->full_name }}</h3>
  <div><span>district:{{ $order->district }} </span> |<span>Sub district: {{ $order->sub_district }}</span></div>
  <div>Home Address: {{$order->address1 }}</div>
  <div>Email: {{$order->email }}</div>
  <div>Phone: {{$order->phone }}</div>
  </div>
  </div>
  <div class="table-responsive-sm">
  <table class="table table-striped">
  <thead>
  <tr>
  <th class="center">#</th>
  <th>Item</th>
  <th>Description</th>
  <th class="right">Price</th>
  <th class="center">Qty</th>
  <th class="right">Total</th>
  </tr>
  </thead>
  <tbody>
    @php
        $total=0;
    @endphp
@forelse ($orderItems as $item)
@php
    $total+=$item->product->price * $item->product_qty
@endphp
<tr>
  <td class="center">{{ $loop->index+1 }}</td>
  <td class="left strong">{{ $item->product->name }}</td>
  <td class="left">{{ $item->product->summary }}</td>
  <td class="right">{{ $item->product->price }}</td>
  <td class="center">{{ $item->product_qty}}</td>
   <td class="right">{{ $item->product->price * $item->product_qty }}</td>
  </tr>
@empty
    
@endforelse

  </tbody>
  </table>
  </div>
  <div class="row">
  <div class="col-lg-4 col-sm-5">
  </div>
  <div class="col-lg-4 col-sm-5 ml-auto">
  <table class="table table-clear">
  <tbody>
  <tr>
  <td class="left">
  <strong class="text-dark">Subtotal</strong>
  </td>
  <td class="right">{{ $total }}/-</td>
  </tr>
  <tr>
  <td class="left">
  <strong class="text-dark">Discount (0%)</strong>
  </td>
  <td class="right">00</td>
  </tr>
  <tr>
  <td class="left">
  <strong class="text-dark">VAT (0%)</strong>
  </td>
  <td class="right">00</td>
  </tr>
  <tr>
  <td class="left">
  <strong class="text-dark">Total</strong>
   </td>
  <td class="right">
  <strong class="text-dark">{{ $total }}/-</strong>
  </td>
  </tr>
  </tbody>
  </table>
  </div>
  </div>
  </div>
  <div class="card-footer bg-white">
  <p class="mb-0">foodpipra.com, konapara, jatrabari,dhaka</p>
  </div>
  </div>
  </div>
@endsection
