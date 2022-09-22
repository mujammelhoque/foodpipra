<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category; 
use App\Models\Seller; 
use App\Models\User;
use App\Models\Product;
use App\Models\ProductsMoreImage;
use App\Models\Brand;
use App\Models\RecentView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShowAllController extends Controller
{
    public function shop_all(){
        $shop_logo = Seller::where('shop_logo', '!=', null)->paginate(12);
        $categories = Category::where('parent_id', '=', 0)->get();
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('fronted.pages.shop_logo_all',compact('categories','carts','shop_logo'));   
     }
     public function all_product_byshop($id){
        $viewname=Seller::findOrFail($id)->shop_name;
        $products = Product::where('seller_id', $id)->paginate(12);
        $categories = Category::where('parent_id', '=', 0)->get();
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('fronted.pages.brandOrShopProduct',compact('categories','carts','products','viewname'));   
     }
     #....................................................................#

    public function brand_all(){
        $brand_logo = Brand::where('status','active')->paginate(20);
        $categories = Category::where('parent_id', '=', 0)->get();
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('fronted.pages.brand_logo_all',compact('categories','carts','brand_logo',));   
     }


    public function all_product_bybrand($name){
        $viewname=Brand::where('name',$name)->firstOrFail()->name;
        $products = Product::where('brand', $name)->paginate(12);
        $categories = Category::where('parent_id', '=', 0)->get();
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('fronted.pages.brandOrShopProduct',compact('categories','carts','products','viewname'));   
     }
          #....................................................................#

    public function category_all($id){
        $viewname=Category::findOrFail($id)->name;
        $productall = Product::where('cat_id',$id)->orderby('id','desc')->paginate(12);
        $categories = Category::where('parent_id', '=', 0)->get();
        $users = User::get();
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('fronted.pages.show_all',compact('categories','users','carts','productall','viewname'));   
     }
          #....................................................................#


    public function subcategory_all($id){
        $viewname=Category::findOrFail($id)->name;
        $productall = Product::where('sub_cat_id',$id)->orderby('id','desc')->paginate(12);
        $categories = Category::where('parent_id', '=', 0)->get();
        $users = User::get();
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('fronted.pages.show_all',compact('categories','users','carts','productall','viewname'));   
     }
          #....................................................................#


    public function new_all(){
        $viewname="New Arrival";

        $productall = Product::orderby('id','desc')->paginate(12);
        $categories = Category::where('parent_id', '=', 0)->get();
        $users = User::get();
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('fronted.pages.show_all',compact('categories','users','carts','productall','viewname'));   
     }
     #....................................................................#

    public function flash_all(){
        $viewname="Flash Sale";

        $productall = DB::table('products')
        ->Join('order_items','products.id','=','order_items.product_id')
        ->selectRaw('products.*, COALESCE(sum(order_items.product_qty),0) total')
        ->groupBy('products.id')
        ->orderBy('total','desc')
        ->skip(1)
        ->take(6)
        ->paginate(12);
        $categories = Category::where('parent_id', '=', 0)->get();
        $users = User::get();
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('fronted.pages.show_all',compact('categories','users','carts','productall','viewname'));   
     }
     #....................................................................#
     
     public function recent_all(){
        $productall = RecentView::orderby('id','desc')->paginate(12);
        $productall = RecentView::where('user_id', '=' , Auth::id()??null)->where('product_id','!=',0)->paginate(12);
        $categories = Category::where('parent_id', '=', 0)->get();
        $users = User::get();
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('fronted.pages.recent_all',compact('categories','users','carts','productall'));   
      }
      #....................................................................#
      
    public function product_view($id){
      RecentView::updateOrCreate(
          ['product_id' => $id],
          ['user_id' =>Auth::id()??NULL ]
      );

      $categories     =   Category::where('parent_id',0)->get();
      $product        =   Product::find($id);
      $relproducts    =   Product::where('cat_id', $product->cat_id)->inRandomOrder()->limit(4)->get();
      $carts = Cart::where('user_id',Auth::id())->get();
      $more_image   = ProductsMoreImage::where('product_id',$id)->get();
      return view('fronted.pages.product_view',compact('categories','product','relproducts','more_image','carts'));
  }

}
