<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Seller;
use Illuminate\Support\Facades\Auth;

class SellerDashboardController extends Controller
{
/*
'name',
'phone',
'shop_name',
'shop_logo',
'seller_pic',
'business_type',
'address',
'seller_rule',
'email',*/

    function create(Request $request){

        $request->validate([
           'name'=>'required',
           'email'=>'required|email|unique:sellers,email',
           'phone'=>'required',
           'shop_name'=>'required',
           'password'=>'required|min:5|max:30',
           'shop_logo' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048'

          //  'cpassword'=>'required|min:5|max:30|same:password'
        ]);
         $shop_logo = "";
        $image = $request->shop_logo??null;
        if ($image != null) {
            $destinationPath = 'upload/shop-img/';
            $shopImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $shopImage);
            $shop_logo = $shopImage;
        }

        $seller = new Seller();
        $seller->name = $request->name;
        $seller->shop_logo = $shop_logo??null;
        $seller->seller_pic = $request->seller_pic??null;
        $seller->email = $request->email;
        $seller->phone = $request->phone;
        $seller->address = $request->address;
        $seller->shop_name = $request->shop_name;
        $seller->business_type = $request->business_type;
        $seller->password = \Hash::make($request->password);
        $save = $seller->save();

        if( $save ){
            return redirect()->route('seller.login')->with('success','You are now registered successfully as Admin');
        }else{
            return redirect()->back()->with('fail','Something went Wrong, failed to register');
        }
  }
#................................................................#
  function check(Request $request){
      //Validate Inputs
      $request->validate([
         'email'=>'required|email|exists:sellers,email',
         'password'=>'required|min:5|max:30'
      ],[
          'email.exists'=>'This email is not exists in sellers table'
      ]);

      $creds = $request->only('email','password');

      if( Auth::guard('seller')->attempt($creds) ){
          return redirect()->route('seller.dashboard');
      }else{
          return redirect()->route('seller.login')->with('fail','Incorrect Credentials');
      }
  }
  #................................................................#


  function index(){
      return view('dashboard.seller.index');
  }
  #................................................................#


  function logout(){
      Auth::guard('seller')->logout();
      return redirect('/');
  }
}
