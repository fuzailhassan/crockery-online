<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Cart;
use App\Models\Cart as ModelsCart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Order::class, 'order');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isAdmin) {
            $orders = Order::where('order_status', 'pending')->orWhere('order_status', 'shipped')->get();
            // dd($orders);
            return view('dashboard.orders.index')->with('orders', $orders);
            
        } else {

            $orders = auth()->user()->orders;
            
            return view('order.index')->with(['orders' => $orders]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'shipping_address' => ['required', 'string'],
            'billing_address' => ['required', 'string']
        ]);
        
        $user_id = auth()->user()->id;
        $carts = auth()->user()->carts->where('checked_out', 0)->all();
        $total = 0;
        foreach ($carts as $cart) {
            $total += ($cart->product->discounted) ? ($cart->product->price - $cart->product->discount) * $cart->quantity : $cart->product->price * $cart->quantity ;
        }
        
        $order = Order::create([
            'user_id' => $user_id,
            'shipping_address' => $validated['shipping_address'],
            'billing_address' => $validated['billing_address'],
            'order_total' => $total,
            'order_status' => 'pending'
        ]);
        if ($order) {
            foreach ($carts as $cart) {
                
               OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product->id,
                    'price' => ($cart->product->discounted) ? ($cart->product->price - $cart->product->discount) * $cart->quantity : $cart->product->price * $cart->quantity,
                    'quantity' => $cart->quantity
    
                ]);
                $cart->update([
                    'checked_out' => 1
                ]);
            }
            
        }
        
        
        

        return redirect()->route('orders.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if (auth()->user()->isAdmin) {
            $orderDetails = $order->orderDetails->where('order_id', $order->id)->all();        
            return view('dashboard.orders.show', [
                'orderDetails' => $orderDetails,
                'order' => $order
            ]);
        } else {            
            
            $orderDetails = OrderDetail::where('order_id', $order->id)->get();        
            return view('order.show', [
                'orderDetails' => $orderDetails,
                'order' => $order
            ]);
            
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'shipping_address' => ['required', 'string'],
            'billing_address' => ['required', 'string'],
            'order_status'=> [
                'required', 
                'string',
                Rule::in(['pending', 'shipped', 'delivered'])
            ]
        ]);
        $order->update($request->all());
        return redirect()->route('orders.index')->banner('Updated Successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {       
        $order->delete();
        return redirect()->route('orders.index')->banner('Deleted Successfully!');
    }
}
