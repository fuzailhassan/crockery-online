<?php

namespace App\Http\Livewire;

use App\Models\Cart as ModelsCart;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Cart extends Component
{   
    public $carts;
    // protected $listeners = [
    //     // 'isdeleted' => 'render'
    // ];
        
    public function render()
    {        
        
        return view('livewire.cart');
        
    }

}
