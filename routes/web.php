<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FoodAdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\SellerInfoController;

use App\Http\Controllers\Seller\SellerDashboardController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Seller\SellerProductsController;
use App\Http\Controllers\Seller\SellerCategoryController;
use App\Http\Controllers\Seller\SellerOrderController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ShowAllController;
use App\Http\Controllers\User\UserController;

#...........................................................#


/*------------------------------------------
All Normal Users Routes List
--------------------------------------------*/
            Route::get('/', [IndexController::class, 'index'])->name('/');
            Route::get('user/login', [LoginController::class, 'user_login'])->name('user.login');
            Route::post('user/check', [LoginController::class, 'user_check'])->name('user.check');
            Route::get('user/register', [RegisterController::class, 'user_register'])->name('user.register');
            Route::post('add-to-cart', [CartController::class, 'addToCart']);
            Route::post('update-to-cart', [CartController::class, 'updateToCart']);
            Route::get('cart-view', [CartController::class, 'cart_view'])->name('cart.view');
            Route::get('delete-cart-item/{id}', [CartController::class, 'deleteCart']);
            Route::get('product-view/{id}', [ShowAllController::class, 'product_view'])->name('product.view');
            Route::get('shop-all-logo', [ShowAllController::class, 'shop_all'])->name('shop.all.logo');
            Route::get('all-product-by-shop-logo/{id}', [ShowAllController::class, 'all_product_byshop'])->name('all.product.byshop');
            Route::get('brand-all-logo', [ShowAllController::class, 'brand_all'])->name('brand.all.logo');
            Route::get('all-product-by-brand-logo/{name}', [ShowAllController::class, 'all_product_bybrand'])->name('all.product.bybrand');
            Route::get('category-all/{id}', [ShowAllController::class, 'category_all'])->name('category.all');
            Route::get('subcategory-all/{id}', [ShowAllController::class, 'subcategory_all'])->name('subcategory.all');
            Route::get('new-all', [ShowAllController::class, 'new_all'])->name('new.all');
            Route::get('flash-all', [ShowAllController::class, 'flash_all'])->name('flash.all');
            Route::get('recent-all', [ShowAllController::class, 'recent_all'])->name('recent.all');


            Auth::routes();


    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
          Route::get('user-dashboard',[UserController::class,'user_dashboard'])->name('user.dashboard');
          Route::post('user-update/{id}',[UserController::class,'user_update'])->name('users.update');
          Route::get('cart-billing-address', [CartController::class, 'billing_address'])->name('billing.address');
          Route::get('getSublocation',[LocationController::class,'getSublocation']);
          Route::get('getSublocationShippingCost',[LocationController::class,'getSublocationShippingCost']);

          Route::resource('order', OrderController::Class);
          Route::get('send-order-mail', [OrderController::class, 'order_mail']);
        //   Route::post('/logout',[UserController::class,'logout'])->name('logout');
        //   Route::get('/add-new',[UserController::class,'add'])->name('add');

    });




/*------------------------------------------
All Admin Routes List
--------------------------------------------*/
Route::prefix('admin/')->name('admin.')->group(function(){
       
          Route::view('/login','dashboard.admin.auth.login')->name('login');
          Route::view('/registration','dashboard.admin.auth.registration')->name('registration');
          Route::post('/create',[AdminDashboardController::class,'create'])->name('create');
          Route::post('/check',[AdminDashboardController::class,'check'])->name('check');

    Route::middleware(['admin'])->group(function(){
        Route::get('dashboard',[AdminDashboardController::class,'index'])->name('dashboard');
        Route::resource('product', ProductController::class);
        Route::resource('location', LocationController::Class);
        Route::put('editlocation/{id}', [CategoryController::class,'editcategory']);
        Route::resource('category', CategoryController::Class);
        Route::put('editcategory/{id}', [CategoryController::class,'editcategory']);
        Route::resource('slider', SliderController::Class);
        Route::resource('brand', BrandController::Class);
        Route::get('seller/info', [SellerInfoController::Class, 'all_seller'])->name('seller.info');
        Route::post('seller/rule/change/{id}', [SellerInfoController::Class, 'seller_rule'])->name('seller.rule.change');
        Route::get('new-order', [OrderController::Class, 'new_order'])->name('order.new');
        Route::get('view-order/{id}', [OrderController::Class, 'view_new_order'])->name('order.view.new');
        Route::get('view-delivered-order/{id}', [OrderController::Class, 'view_deliver_order'])->name('order.view.deliver');
        Route::get('pdf-delivered-order/{id}', [OrderController::Class, 'deliver_order_pdf'])->name('deliver.order.pdf');
        Route::get('view-cancel-order/{id}', [OrderController::Class, 'view_cancel_order'])->name('order.view.cancel');
        Route::post('change-order-position', [OrderController::Class, 'change_order_position'])->name('order.position');
        Route::get('delivered-order', [OrderController::Class,'delivered_order'])->name('order.delivered');
        Route::get('cancel-order', [OrderController::Class,'cancel_order'])->name('order.cancel');
  
        Route::get('getSubCategory',[CategoryController::class,'getSubCategory'])->name('getSubCategory');

        Route::post('/logout',[AdminDashboardController::class,'logout'])->name('logout');
    });

});



/*------------------------------------------
All Admin Seller List
--------------------------------------------*/
Route::prefix('seller/')->name('seller.')->group(function(){

       Route::middleware(['guest:seller','PreventBackHistory'])->group(function(){
            Route::view('login','dashboard.seller.auth.login')->name('login');
            Route::view('register','dashboard.seller.auth.registration')->name('register');
            Route::post('create',[SellerDashboardController::class,'create'])->name('create');
            Route::post('check',[SellerDashboardController::class,'check'])->name('check');
       });


       Route::middleware(['auth:seller','PreventBackHistory'])->group(function(){
        Route::get('dashboard',[SellerDashboardController::class,'index'])->name('dashboard');
        Route::resource('product',SellerProductsController::class);
        Route::get('all/order',[SellerOrderController::class,'all_order'])->name('all.order');
        Route::get('all/new',[SellerOrderController::class,'all_order_new'])->name('all.new');
        Route::get('all/delivered',[SellerOrderController::class,'all_order_delivered'])->name('all.delivered');
        Route::get('all/cancel',[SellerOrderController::class,'all_order_cancel'])->name('all.cancel');
        Route::get('getSubCategory',[SellerCategoryController::class,'getSubCategory']);
        Route::get('view/order/{id}', [SellerOrderController::Class, 'view_order'])->name('order.view');
        Route::get('pdf/delivered-order/{id}', [SellerOrderController::Class, 'deliver_order_pdf'])->name('deliver.order.pdf');



        Route::view('/home','dashboard.seller.index')->name('home');
        Route::post('logout',[SellerDashboardController::class,'logout'])->name('logout');
       });

});
