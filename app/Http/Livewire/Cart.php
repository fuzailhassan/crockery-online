<?php

namespace App\Http\Livewire;

use App\Models\Cart as ModelsCart;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Cart extends Component
{   
    public $carts, $cartTotal = 0;
    public $cart, $display = true;

    protected $listeners = [        
        'updateTotal'
    ];

    // protected $listeners = [
    //     'isDeleted' => 'isDeleted' 
    // ];
        
    public function mount()
    {
      
    }
    public function render()
    {        
        
        foreach ($this->carts as $cart ) {            
                   
            $this->cartTotal += ($cart->product->discounted) ? ($cart->product->price - $cart->product->discount) * $cart->quantity : $cart->product->price * $cart->quantity ;
        }
        return view('livewire.cart');

        
    }

    public function deleteCartItem(ModelsCart $cart)
    {
        $cart->delete();
        $this->display = false;
        $this->emit('updateCartCount'); 
        $this->mount();
        return redirect()->route('cart.index');       
        
        // $this->emit('isDeleted');
        
    }

    public function updateTotal()
    {
        return redirect()->route('cart.index');
    }
    // public function isDeleted()
    // {
    //     foreach ($this->carts as $cart ) {
            
    //         if (!is_array($cart)) {
    //             $this->cartTotal += ($cart->product->discounted) ? $cart->product->price - $cart->product->discount : $cart->product->price ;
    //         }
    //     }
    // }



}
