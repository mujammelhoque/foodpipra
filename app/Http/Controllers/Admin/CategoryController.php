<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{

    public function __construct()
   {
 
    // $this->middleware("onlyadmin");
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $allCategories = Category::orderBy('id','DESC')->get();
        $categories = Category::where('parent_id', '=', 0)->get();
        // dd($categories);

        return view('dashboard.admin.category.index',compact('categories','allCategories'));

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
        $validatedData = $this->validate($request, [
            'name'      => 'required',
      ]);

        $input = $request->all();

        $input['user_id'] = Auth::id();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        Category::create($input);
        return redirect()->route('admin.category.index')->withSuccess('You have successfully created a Category!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    public function editcategory(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);
        $category=Category::find($id);
        $category->update($request->all());
    
        return back()->with('success','Your categroy updated successfully');
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }

    public function getSubCategory(Request $request){
        $subcategories = DB::table("categories")
        ->where("parent_id",$request->category_id)
        ->pluck("name","id");
        return response()->json($subcategories);
    }
}
