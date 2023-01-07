<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{   
    public $carts; 
    public function render()
    {        
        return view('livewire.cart');
    }

}
