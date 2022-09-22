<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellerCategoryController extends Controller
{
    public function getSubCategory(Request $request){
        $subcategories = DB::table("categories")
        ->where("parent_id",$request->category_id)
        ->pluck("name","id");
        return response()->json($subcategories);
    }
}
