<x-dashboard-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">                
                <div class="overflow-auto flex flex-col">
                    <h1 class="text-2xl text-center">
                        Order ID: {{ $order->id }}
                    </h1>
                    <h1 class="text-xl text-center">
                        Order Status: {{ $order->order_status }}
                    </h1>
                    
                    <table class="table-fixed border-collapse p-3 m-3 text-center"> 
                        <tr>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Product Name</th>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Unit Price</th>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Quantity </th>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Total </th>
                            
                            
                        </tr>
                        
                        @foreach ($orderDetails as $orderDetail)                           
                            <tr>
                                <td class="p-3">{{ $orderDetail->product->name }}</td>
                                    <td class="p-3">{{ $orderDetail->price }}</td>
                                    <td class="p-3">{{ $orderDetail->quantity }}</td>
                                    <td class="p-3">{{ $orderDetail->price * $orderDetail->quantity }}</td>                                    
                            </tr>
                           @endforeach 
                           <tr class="mb-8 border border-b-slate-800">
                               <td></td>
                            <td></td>
                            <td>Order Total</td>
                            <td>Rs {{ $order->order_total }}</td>
                           </tr>
                           
                       </table>
                       <div >
                        <h1 class="text-2xl text-center my-6">
                            Update Order
                        </h1>
                        <x-jet-validation-errors class="mb-4" />

                           <div class="flex justify-center">
                               <form method="POSt" action="{{ route('orders.update', $order) }}">
                                   @csrf
                                   @method('PUT')
                                   <label for="order_status">
                                       Update Order Status
                                   </label>
                                   <select name="order_status" id="order_status">
                                       <option value="pending" @selected($order->order_status === 'pending') >Pending</option>
                                       <option value="shipped" @selected($order->order_status === 'shipped')>Shipped</option>
                                       <option value="delivered" @selected($order->order_status === 'delivered')>Delivered</option>
                                   </select>
                                   <div class="justify-center w-full md:w-2/3">
                                       <x-jet-label class="text-lg" for="shipping_address" value="{{ __('Shipping Address') }}" />
                                       <textarea id="shipping_address" name="shipping_address" class="mt-1 p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="discription" cols="30" rows="3">{{ old('shipping_address') ?? $order->shipping_address }}</textarea> 
                                   </div>
                                   <div class="justify-center w-full md:w-2/3">
                                       <x-jet-label class="text-lg" for="billing_address" value="{{ __('Billing Address') }}" />
                                       <textarea id="billing_address" name="billing_address" class="mt-1 p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="discription" cols="30" rows="3">{{ old('billing_address') ?? $order->billing_address }}</textarea> 
                                   </div>
                                   <div class="mt-4 text-center">
                                       <x-jet-button class="">
                                           Update Order
                                       </x-jet-button>
                       
                                   </div>
                               </form>
                           </div>
                           <div class="flex justify-center">
                               <form action="{{ route('orders.destroy', $order)}}" method="post">
                                   @csrf
                                   @method('DELETE')
                                       <x-jet-button class="inline-block my-6 bg-red-500">
                                           Delete Order
                                       </x-jet-button>
                       
                                   
                       
                               </form>
                           </div>
                           
                       </div>
                    </div>
                 
                </div>
            </div>
    </div>
</x-dashboard-layout>