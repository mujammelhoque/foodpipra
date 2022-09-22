<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Seller;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\RecentView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;





class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Artisan::call('cache:clear');
        // Artisan::call('config:clear');
        // Artisan::call('view:clear');
        // Artisan::call('route:clear');
        $flashsales = DB::table('products')
            ->Join('order_items','products.id','=','order_items.product_id')
            ->selectRaw('products.*, COALESCE(sum(order_items.product_qty),0) total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(12)
            ->get();

        $categories = Category::where('parent_id', '=', 0)->get();
        $sellers = Seller::limit(12)->get();
        $sliders = Slider::where('status','active')->get();
        $brands = Brand::where('status','active')->limit(8)->get();
        $newarrivals = Product::orderBy('id','desc')->take(12)->get();
        // $restaurants = Product::where('brand','restaurant')->orderBy('id','desc')->take(8)->get();
        $recentviews = RecentView::where('user_id', '=' , Auth::id()??null)->where('product_id','!=',0)->take(12)->get();
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('fronted.index',compact('categories','sellers','newarrivals','sliders','brands','carts','flashsales','recentviews',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
