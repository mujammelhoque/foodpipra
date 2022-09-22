<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['location', 'parent_id', 'shipping_cost',];

    public function childs()
    {
        return $this->hasMany(Location::class, 'parent_id', 'id');
    }

}
