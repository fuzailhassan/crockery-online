<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;

class AddTocart extends Component
{
    public $product_id;
    public function render()
    {
        return view('livewire.add-tocart');
    }
    public function addToCart()
    {        
        Cart::create([
            'customer_id' => auth()->user()->id,
            'product_id' => $this->product_id
        ]);

    }
}
