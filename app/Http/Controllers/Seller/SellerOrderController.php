<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\RecentView;
use App\Models\ProductsMoreImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\DB;
use PDF;

class SellerOrderController extends Controller
{
    public function all_order(){
        $orders = DB::table('orders')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->where('products.seller_id',Auth::guard('seller')->id())
        ->select('orders.*', 'order_items.*', 'products.*')
        ->paginate(12);
        // dd( $orders);
        return view('dashboard.seller.order.index',compact('orders'));
    }
    public function all_order_new(){
        $orders = DB::table('orders')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->where('orders.position','new')
        ->where('products.seller_id',Auth::guard('seller')->id())
        ->select('orders.*', 'order_items.*', 'products.*')
        ->paginate(12);
        // dd( $orders);
        return view('dashboard.seller.order.index',compact('orders'));
    }
    public function all_order_delivered(){
        $orders = DB::table('orders')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->where('orders.position','delivered')
        ->where('products.seller_id',Auth::guard('seller')->id())
        ->select('orders.*', 'order_items.*', 'products.*')
        ->paginate(12);
        // dd( $orders);
        return view('dashboard.seller.order.index',compact('orders'));
    }
    public function all_order_cancel(){
        $orders = DB::table('orders')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->where('orders.position','cancel')
        ->where('products.seller_id',Auth::guard('seller')->id())
        ->select('orders.*', 'order_items.*', 'products.*')
        ->paginate(12);
        // dd( $orders);
        return view('dashboard.seller.order.index',compact('orders'));
    }

    public function view_order($id){
        $order = Order::find($id);

        $orderItems = OrderItem::where('order_id',$id)->get();
        return view('dashboard.seller.order.view_order',compact('order','orderItems'));
    }

    
    public function deliver_order_pdf($id)
    {
        $order = Order::find($id);

        $orderItems = OrderItem::where('order_id',$id)->get();
        // dd($orderItems );
        $pdf = PDF::loadView('dashboard.seller.order.pdf_delivered',compact('order','orderItems'));
        // $pdf = PDF::loadView('testfdf');
  
        return $pdf->download('foodpipra_seller_delivered_order.pdf');
    }
}
