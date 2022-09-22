<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Product extends Model
{
    use HasFactory;
    protected $fillable= [ 
    'admin_id',
    'seller_id',
    'cat_id',
    'sub_cat_id',
    'name',
    'title',
    'sku',
    'slug',
    'summary',
    'description',
    'photo',
    'stock',
    'weight',
    'size',
    'brand',
    'condition',
    'status',
    'price',
    'ori_price',
    'discount',
    'is_featured',
        ];

    public function cat_info(){
        return $this->hasOne('App\Models\Category','id','cat_id');
    }
    public function sub_cat_info(){
        return $this->hasOne('App\Models\Category','id','sub_cat_id');
    }
    public static function getAllProduct(){
        return Product::with(['cat_info','sub_cat_info'])->orderBy('id','desc')->paginate(10);
    }
    public static function getAllSellerProduct(){
        return Product::with(['cat_info','sub_cat_info'])->where('seller_id',Auth::guard('seller')->id())->orderBy('id','desc')->paginate(10);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    public function more_image()
    {
        return $this->hasMany(ProductsMoreImage::class);
    }
    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // public function carts()
    // {
    //     return $this->hasMany(Cart::class, 'product_id','id');
    // }
    // public function comment()
    // {
    //     return $this->hasMany(Comment::class, 'foreign_key', 'local_key');

    // }

    
   
}
