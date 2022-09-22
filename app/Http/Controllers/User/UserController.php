<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Cart;

class UserController extends Controller
{
    function user_dashboard(){
        $categories = Category::where('parent_id', '=', 0)->get();
        $carts = Cart::where('user_id',Auth::id())->get();

        return view('fronted.user.index',compact('categories','carts'));
    }
    function user_update(Request $request,  $id){
        if ($image = $request->user_pic) {
            $destinationPath = 'upload/user-img/';
            $userImage = date('YmdHis') .".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $userImage);
        }
            $user = User::find($id);
            $user->user_pic = $userImage??'';
            $user->update();
            return back();

    }
}
