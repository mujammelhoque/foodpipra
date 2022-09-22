<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['invoice','full_name','email','phone','location_id','sublocation_id','address1','address2','payment_method','txn_id','user_id','coupon','total','ship_cost','position'];
    public function order_items()
    {
        return $this->hasMany(OrderItem::class,'order_id','id');
    }
 
    
}
