<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function OrderDetails()
    {
        return $this->hasMany(orderdetails::class,'order_id');
    }
}
