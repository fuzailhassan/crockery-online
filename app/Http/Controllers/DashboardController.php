<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function productsIndex()
    {
        Gate::authorize('viewDashboard');
        $products = Product::paginate('12');
        return view('dashboard.products.index')->with('products', $products);
    }

    public function usersIndex()
    {
        Gate::authorize('viewDashboard');
        $users = User::paginate(12);
        return view('dashboard.users.index')->with('users', $users);
    }
    
}
