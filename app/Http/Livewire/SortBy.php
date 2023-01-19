<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SortBy extends Component
{
    public $byCategory;
    public $sortBy;
    public $categories;
    

    public function mount()
    {
    }
    public function render()
    {

        return view('livewire.sort-by');
    }
    public function sortBy()
    {
        $sortBy = $this->sortBy;
        return redirect()->route('products.indexSorted', $sortBy);

        
    }
    public function byCategory()
    {
        dd();
        $byCategory = $this->byCategory;
        return redirect()->route('categories.show', $byCategory);
    }

}
