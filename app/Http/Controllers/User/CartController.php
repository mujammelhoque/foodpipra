<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function billing_address(){
    $categories = Category::where('parent_id', '=', 0)->get();
    $locations = Location::where('parent_id', '=', 0)->get();
    $carts = Cart::where('user_id',Auth::id())->get();

    return view('fronted.pages.billing_address',compact('categories','carts','locations'));
    }

    ##.................................##...................................##
    public function cart_view()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        $homeMades = Product::where('brand','home')->orderBy('id','desc')->take(15)->get();
        $carts = Cart::where('user_id',Auth::id())->get();

        return view('fronted.pages.cartview',compact('categories','homeMades','carts'));
    }
     ##.................................##...................................##

    
    public function addToCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check()) {

            $product_check = Product::where('id',$product_id)->exists();
            if ($product_check ) {
                if (Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()) {
                 
                    return response()->json(['status'=>'already added to cart']);

                }else {
                    $cartItem = new Cart();
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_id = $product_id;
                    $cartItem->product_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status'=>'added']);
                }
            }
        }else{
            return response()->json(['login'=>'Login to continue']);
        }
    }
    ##.................................##...................................##


    public function updateToCart(Request $request)
    {
        $cart_id = $request->input('cart_id');
        $product_qty = $request->input('product_qty');
        $m_product_qty = $request->input('m_product_qty');

        if (isset($m_product_qty)) {
            foreach ($cart_id as $key => $value) {
                Cart::where('id', $value)
                ->update(['product_qty' => $m_product_qty[$key]]);
            }
            return response()->json(['status'=>'cart updated']);
            
        }else {
            foreach ($cart_id as $key => $value) {
                Cart::where('id', $value)
                ->update(['product_qty' => $product_qty[$key]]);
            }
            return response()->json(['status'=>'cart updated']);
        }
     
    }
    ##.................................##...................................##

  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function deleteCart( $id)
    {

        Cart::where('user_id',Auth::id())->where('id',$id)->delete();
        return back();

    }
    ##.................................##...................................##

    public function sendemail (Request $request){
        // dd($request->payment);
        if ($request->payment!='Cash-On-Delivery') {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required',
                'payment' => 'required',
                'txnid' => 'required',
            ]);  
        }else{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required',
                'payment' => 'required',
            ]); 
        }
        $cart = session()->get('cart');
        $cartarry = json_encode( $cart );
        $details = [
            'title' => 'Mail from Online Web Tutor',
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'payment' => $request->payment,
            'txnid' => $request->txnid??'Not found',
            'cart' => $cartarry ,
        ];
       
        Mail::to('mujammelh111@gmail.com')->send(new \App\Mail\MyTestMail($details));
        session()->forget('cart');
        return redirect()->route('publication')
        ->with('success','Your Order is successfully done.');
        
        
    }
}
