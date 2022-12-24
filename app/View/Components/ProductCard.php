<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
    public $pid;
    public $name;
    public $price;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pid, $name, $price)
    {
        $this->pid = $pid;
        $this->name = $name;
        $this->price = $price;  
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-card');
    }
}
