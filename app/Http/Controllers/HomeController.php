<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->isAdmin) {
            return view('dashboard.index');
        } else {
            return redirect()->route('home');
        }
        
    }

    public function index()
    {
        $products = Product::paginate(4); 
        return view('index')->with('products',$products);
    }
}
