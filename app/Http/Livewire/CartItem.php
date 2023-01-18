<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartItem extends Component
{
    // public $cartTotal, $cartPrice;
    public $cart, $display = true;

    protected $listeners = [        
        'updateTotal' => 'render'
    ];

    public function render()
    {
        // $this->cartPrice = ($this->cart->product->discounted) ? $this->cart->product->price - $this->cart->product->discount : $this->cart->product->price ;
        // $this->cartTotal = $this->cart->quantity * $this->cartPrice;        
        
        return view('livewire.cart-item');

    }

    public function deleteCartItem(Cart $cart)
    {
        $cart->delete();
        $this->emit('updateCartCount');        
        $this->display = false;
        $this->emit('isDeleted');
        
    }
    // public function updateQuantity($quantity, Cart $cart)
    // {
    //     $cart->update([
    //         'quantity' => $quantity
    //     ]);
    //     $this->updateTotal($quantity);
    //     $this->render();
    // }

    // public function updateTotal($quantity)
    // {
    //     $this->cartTotal = $quantity * $this->cartPrice;   
    // }
}
