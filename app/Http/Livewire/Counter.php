<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $cart_id; 
    public function increment()
    {
        $this->count++; 
        $this->emit('updateQuantity', $this->count, $this->cart_id);
    }
    public function decrement()
    {
        if($this->count>1)
        {
            $this->count--;
            $this->emit('updateQuantity', $this->count, $this->cart_id);
        }
        return;
    }
    public function render()
    {
        return view('livewire.counter');
    }
    
}
