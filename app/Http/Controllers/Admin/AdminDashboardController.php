<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    function create(Request $request){
          $request->validate([
             'name'=>'required',
             'email'=>'required|email|unique:admins,email',
             'phone'=>'required',
             'password'=>'required|min:5|max:30',
            //  'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $admin = new Admin();
          $admin->name = $request->name;
          $admin->email = $request->email;
          $admin->phone = $request->phone;
          $admin->address = $request->address;
          $admin->org_name = $request->org_name;
          $admin->business_type = $request->business_type;
          $admin->password = \Hash::make($request->password);
          $save = $admin->save();

          if( $save ){
              return redirect()->route('admin.login')->with('success','You are now registered successfully as Admin');
          }else{
              return redirect()->back()->with('fail','Something went Wrong, failed to register');
          }
    }
#................................................................#
    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:admins,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in admins table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('admin')->attempt($creds) ){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login')->with('error','Incorrect Credentials');
        }
    }
    #................................................................#


    function index(){
        // dd(Auth::guard('admin')->user()->name);
        return view('dashboard.admin.index');
    }
    #................................................................#


    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
