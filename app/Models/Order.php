<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_number', 'customer_name', 'notes', 'subtotal', 'discount', 'total', 'payment_method'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
