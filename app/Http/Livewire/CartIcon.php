<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartIcon extends Component
{
    public $noOfCarts = 0;
    protected $listeners = [
        'updateCartCount' => 'render',
        'updateQuantity'
    ];
    public function render()
    {
        $this->updateCartCount();
        return view('livewire.cart');

    }

    // public function cart()
    // {
    //     // $carts = auth()->user()->carts->where('checked_out', 0)->all();        
    //     return redirect()->to('/cart');
    // }

    public function updateCartCount()
    {
        if (auth()->user()) {
            $this->noOfCarts = auth()->user()->carts->where('checked_out', 0)->count();        
            // $this->noOfCarts = count($carts);
        }
    }

    public function updateQuantity($quantity, $cart_id)
    {
        $cart = auth()->user()->carts->find($cart_id);
        $cart->update([
            'quantity' => $quantity
        ]);

         $this->emit('updateTotal');
    }
}
