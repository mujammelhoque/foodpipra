<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductsMoreImage;
use Image;

class SellerProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::getAllSellerProduct();
        return view('dashboard.seller.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('parent_id',0)->get();
        $brands=Brand::where('status','active')->get();
        return view('dashboard.seller.product.add',compact('categories','brands'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

         // return $request->all();
        // $this->validate($request,[
        //     'title'=>'string|required',
        //     'summary'=>'string|required',
        //     'description'=>'string|nullable',
        //     'photo'=>'required|mimes:png,jpg,jpeg,jiff,pdf,xlx,csv|max:2048',
        //     'size'=>'nullable',
        //     'stock'=>"required|numeric",
        //     // 'cat_id'=>'required|exists:categories,id',
        //     // 'brand_id'=>'nullable|exists:brands,id',
        //     // 'child_cat_id'=>'nullable|exists:categories,id',
        //     // 'is_featured'=>'sometimes|in:1',
        //     'status'=>'required',
        //     // 'condition'=>'required|in:default,new,hot',
        //     'price'=>'required|numeric',
        //     'discount'=>'nullable|numeric'
        // ]);
      
        $input = $request->all();
        if ($image = $request->file('photo')) {
            $input['photo'] = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $destinationPath = 'upload/featured-image';
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(150, 150, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['photo']);
        $destinationPath = 'upload/featured-original';
        $image->move($destinationPath, $input['photo']);


            // $destinationPath = 'upload/featured-image/';
            // $bookImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // $image->move($destinationPath, $bookImage);
            // $input['photo'] = $bookImage;
        }   
        $input['seller_id'] = Auth::guard('seller')->id();
        $id = Product::create($input)->id;

        if($request->hasfile('more_photo'))
        {
            foreach($request->file('more_photo') as $file){
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('upload/more-image'), $name);  
                ProductsMoreImage::create([
                    'product_id'      => $id,
                    'more_photo'      =>$name,
                ]);
            }
        }
        return back()->with('success','Your product is submited successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.seller.product.show',compact('product'));
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
