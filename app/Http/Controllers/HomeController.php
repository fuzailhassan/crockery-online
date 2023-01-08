<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(Request $request)
    {
        if (auth()->user()->isAdmin) {
            return view('dashboard.index');
        } else {
            return view('index');
        }
        
    }

    public function index()
    {
        $products = Product::paginate(4); 
        return view('index')->with('products',$products);
    }
}
