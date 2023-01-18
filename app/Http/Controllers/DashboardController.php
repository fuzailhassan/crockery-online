<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin) {
            $users = User::orderByDesc('created_at')->paginate(10);
            $pendOrders = Order::where('order_status', 'pending')->get();

            $shippedOrders = Order::where('order_status', 'shipped')->count();
            $deliveredOrders = Order::where('order_status', 'shipped')->get();
            $sales = 0;
            foreach ($deliveredOrders as $order) {
                $sales += $order->order_total;
            }
            return view('dashboard.index')->with([
                'users' => $users,
                'pendOrders' => $pendOrders,
                'shippedOrders' => $shippedOrders,
                'sales' => $sales,
                
            ]);
        } else {
            return redirect()->route('home');
        }
    }
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
