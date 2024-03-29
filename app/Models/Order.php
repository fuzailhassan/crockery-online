<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'shipping_address', 'billing_address', 'order_total', 'payment_method', 'order_status', 'shipped_at', 'delivered_at'
    ];

    
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);  
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
