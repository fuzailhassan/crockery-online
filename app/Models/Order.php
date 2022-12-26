<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    private $fillable = [
        'customer_id', 'shipping_address', 'billing_address', 'order_total', 'payment_method', 'order_status', 'shipped_at', 'delivered_at'
    ];

    
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);  
    }

}
