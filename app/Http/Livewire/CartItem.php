<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartItem extends Component
{
    // public $cartTotal, $cartPrice;
    public $cart, $isDeleted;

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
        $this->cart->delete();
        $this->isDeleted = true;
        $this->emit('updateCartCount');
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
