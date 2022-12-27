<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class AddToCart extends Component
{
    public $product_id;
    public function render()
    {
        return view('livewire.add-to-cart');
    }
    public function addToCart()
    {   
        
        if (auth()->user()) {
            
            $cart = auth()->user()->carts->where('product_id',$this->product_id)->first();
            
            if ($cart) {
                $cart->update([
                    'quantity'=> $cart->quantity+1
                ]);
            } else {
                Cart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $this->product_id
                ]);
            }
        } else {
            return redirect()->route('login')->with('status','Login first!');
        }
        

    }
}
