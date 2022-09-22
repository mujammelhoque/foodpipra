<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderItem;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;


class OrderController extends Controller
{
      ##.....................................##..........................................##

    public function new_order(){
    

          $orders = Order::orderby('id','desc')->where('position','new')->paginate(15);
   
      return view('dashboard.admin.order.index', compact('orders'));
    }


    public function view_new_order($id)
    {
        
        $order = Order::find($id);

        $orderItems = OrderItem::where('order_id',$id)->get();
        return view('dashboard.admin.order.view_new_order',compact('order','orderItems'));

    }

    public function change_order_position(Request $request)
    {
        // Post::where('id',3)->update(['title'=>'Updated title']);
        Order::where('id', $request->change_id)
        ->update(['position' => $request->change_position]);

        if ($request->change_position =='delivered') {
            return redirect()->route('admin.order.delivered');
        }elseif($request->change_position =='new') {
            return redirect()->route('admin.order.new');
        }else {
            return redirect()->route('admin.order.cancel');
        }
        return back();

    }

    ##.....................................##..........................................##


    public function delivered_order()
    {
        $orders = Order::orderby('id','desc')->where('position','delivered')->paginate(15);
   
        return view('dashboard.admin.order.deliver_index', compact('orders'));

    }

    
    public function view_deliver_order($id)
    {
        
        $order = Order::find($id);

        $orderItems = OrderItem::where('order_id',$id)->get();
        return view('dashboard.admin.order.view_deliver_order',compact('order','orderItems'));

    }

     public function deliver_order_pdf($id)
    {
        $order = Order::find($id);

        $orderItems = OrderItem::where('order_id',$id)->get();
        // dd($orderItems );
        $pdf = PDF::loadView('dashboard.admin.order.pdf_delivered',compact('order','orderItems'));
        // $pdf = PDF::loadView('testfdf');
  
        return $pdf->download('FoodPipra_order_delivered.pdf');
    }
    ##.....................................##..........................................##

    public function cancel_order()
    {
        $orders = Order::orderby('id','desc')->where('position','delivered')->paginate(15);
   
        return view('dashboard.admin.order.deliver_index', compact('orders'));

    }

    public function view_cancel_order($id)
    {
        
        $order = Order::find($id);

        $orderItems = OrderItem::where('order_id',$id)->get();
        return view('dashboard.admin.order.view_cancel_order',compact('order','orderItems'));

    }
    ##.....................................##..........................................##

    public function store(Request $request)
    {
        $rand = Str::random(3).Str::random(3).'_'.rand(5,10000);

        //  dd($request->all());
        $id = Order::insertGetId([
            'invoice'=>$rand ,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location_id' => $request->location_id,
            'sublocation_id' => $request->sublocation_id,
            'address1' => $request->address1,
            'address2' => $request->address2??'',
            'address2' => $request->address2??'',
            'payment_method' => $request->payment_method,
            'txn_id' => $request->txn_id??'',
            'user_id' => Auth::id(),
            'coupon' => $request->coupon??null,
            'total' => $request->total??0,
            'ship_cost' => $request->ship_cost,
            'position' => 'new',
           
        ]);
        $cartarry = Cart::where('user_id',Auth::id())->get();
        if (isset($cartarry)) {
        foreach ($cartarry as $cart) {
            OrderItem::insert([
                'order_id' => $id,
                'product_id' => $cart->product_id,
                'product_qty' => $cart->product_qty,
            ]);
            }
        }
          $details = [
            'title' => 'Mail from FoodPipra',
            'name' => $request->name,
            'email' => $request->email,
            'address1' => $request->address1,
            'phone' => $request->phone,
            'carts' => $cartarry ,
        ];
        Mail::to($request->email)->send(new \App\Mail\OrderMail($details));
        Mail::to('mahfujmazumder@gmail.com')->send(new \App\Mail\OrderMail($details));
        session()->forget('cart');

       Cart::where('user_id',Auth::id())->delete();

        return redirect()->route('/')
        ->with('success','Your Order is successfully done.');
       // if ($request->payment!='Cash-On-Delivery') {
        //     $request->validate([
        //         'name' => 'required',
        //         'email' => 'required|email',
        //         'phone' => 'required',
        //         'address' => 'required',
        //         'payment' => 'required',
        //         'txnid' => 'required',
        //     ]);  
        // }else{
        //     $request->validate([
        //         'name' => 'required',
        //         'email' => 'required|email',
        //         'phone' => 'required',
        //         'address' => 'required',
        //         'payment' => 'required',
        //     ]); 
        // }
        // $cartarry = json_encode( $cart );
        // $details = [
        //     'title' => 'Mail from FoodPipra',
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'address1' => $request->address1,
        //     'phone' => $request->phone,
        //     'cart' => $cartarry ,
        // ];
       
      
        
        
    
    }
        ##.....................................##..........................................##



}
