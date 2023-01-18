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
            
            $cart = auth()->user()->carts->where('product_id',$this->product_id)->where('checked_out',0)->first();
            
            // ModelsCart::updateOrCreate(
            //     ['user_id' => auth()->user()->id,
            //     'product_id' => $this->product_id],
            //     ['quantity'=> $cart->quantity+1]

            // );
            
            if ($cart) {                
                
                if ($cart->checked_out === 0) {
                    // dd("checked==0");                    
                    $cart->update([
                        'quantity'=> $cart->quantity+1
                    ]);
                } else {
                    // dd("checked==1"); 
                    Cart::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $this->product_id
                    ]);
                }
            } else {
                // dd("cart does noy exist");
                Cart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $this->product_id
                ]);
            }

            $this->emit('updateCartCount');
        } else {
            return redirect()->route('login')->with('status','Login first!');
        }
        

    }
}
