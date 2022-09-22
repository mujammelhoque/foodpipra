<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\RecentView;
use App\Models\ProductsMoreImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::getAllProduct();
        return view('dashboard.admin.product.index',compact('products'));
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
        return view('dashboard.admin.product.add',compact('categories','brands'));
    }

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
        $input['admin_id'] = Auth::guard('admin')->id();
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.admin.product.show',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brand=Brand::get();
        $product=Product::findOrFail($id);
        $category=Category::where('is_parent',1)->get();
        $items=Product::where('id',$id)->get();
        // return $items;
        return view('backend.product.edit')->with('product',$product)
                    ->with('brands',$brand)
                    ->with('categories',$category)->with('items',$items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product=Product::findOrFail($id);
        $this->validate($request,[
            'title'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'string|required',
            'size'=>'nullable',
            'stock'=>"required|numeric",
            'cat_id'=>'required|exists:categories,id',
            'child_cat_id'=>'nullable|exists:categories,id',
            'is_featured'=>'sometimes|in:1',
            'brand_id'=>'nullable|exists:brands,id',
            'status'=>'required|in:active,inactive',
            'condition'=>'required|in:default,new,hot',
            'price'=>'required|numeric',
            'discount'=>'nullable|numeric'
        ]);

        $data=$request->all();
        $data['is_featured']=$request->input('is_featured',0);
        $size=$request->input('size');
        if($size){
            $data['size']=implode(',',$size);
        }
        else{
            $data['size']='';
        }
        // return $data;
        $status=$product->fill($data)->save();
        if($status){
            request()->session()->flash('success','Product Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $product=Product::findOrFail($id);
        if(File::exists(public_path('upload/featured-image/'.$product->photo))){
            File::delete(public_path('upload/featured-image/'.$product->photo));
        }
        if (ProductsMoreImage::where('id',$product->id)->exists()) {
            $products_more_image=ProductsMoreImage::where('id',$product->id)->get();
            foreach ($products_more_image as $key => $value) {
                if(File::exists(public_path('upload/more-image/'.$value->more_photo))){
                    File::delete(public_path('upload/more-image/'.$value->more_photo));
                }
            }
        }
        ProductsMoreImage::where('id',$product->id)->delete();
        $status=$product->delete();
        
        if($status){
            request()->session()->flash('success','Product successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product');
        }
        return redirect()->route('admin-product.index');
    }

    
}
