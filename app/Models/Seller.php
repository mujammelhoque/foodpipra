<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Seller extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'seller';

    protected $fillable = [
        'name',
        'phone',
        'shop_name',
        'shop_logo',
        'seller_pic',
        'business_type',
        'address',
        'seller_rule',
        'email',
    ];
     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
      /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
