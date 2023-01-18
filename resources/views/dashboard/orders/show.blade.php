<x-dashboard-layout>
    <x-slot:heading>
        Order Detail
    </x-slot>
                <div class="overflow-auto flex flex-col">
                    <h1 class="text-2xl text-center dark:text-white">
                        Order ID: {{ $order->id }}
                    </h1>
                    <h1 class="text-xl text-center dark:text-white">
                        Order Status: {{ $order->order_status }}
                    </h1>
                    
                    <x-data-table>
                        <x-slot:head>
                            <th class="px-4 py-3"> Product Name</th>
                            <th class="px-4 py-3"> Unit Price</th>
                            <th class="px-4 py-3"> Quantity </th>
                            <th class="px-4 py-3"> Total </th>
                            
                            
                        </x-slot>
                        
                        @foreach ($orderDetails as $orderDetail)                           
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="p-3">{{ $orderDetail->product->name }}</td>
                                    <td class="px-4 py-3">{{ $orderDetail->price }}</td>
                                    <td class="px-4 py-3">{{ $orderDetail->quantity }}</td>
                                    <td class="px-4 py-3">{{ $orderDetail->price * $orderDetail->quantity }}</td>                                    
                            </tr>
                           @endforeach 
                           <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3"></td>
                            <td class="px-4 py-3"></td>
                            <td class="px-4 py-3">Order Total</td>
                            <td class="px-4 py-3">Rs {{ $order->order_total }}</td>
                           </tr>
                           
                        </x-data-table>
                       <div >
                        <h1 class="text-2xl text-center my-6 dark:text-white">
                            Update Order
                        </h1>
                        <x-jet-validation-errors class="mb-4" />

                           <div class="flex flex-col justify-center px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                               <form method="POSt" action="{{ route('orders.update', $order) }}">
                                   @csrf
                                   @method('PUT')
                                   <x-jet-label for="order_status">
                                       Update Order Status
                                   </x-jet-label>
                                   <select name="order_status" id="order_status">
                                       <option value="pending" @selected($order->order_status === 'pending') >Pending</option>
                                       <option value="shipped" @selected($order->order_status === 'shipped')>Shipped</option>
                                       <option value="delivered" @selected($order->order_status === 'delivered')>Delivered</option>
                                   </select>
                                   <div class="justify-center w-full md:w-2/3">
                                       <x-jet-label class="text-lg" for="shipping_address" value="{{ __('Shipping Address') }}" />
                                       <textarea id="shipping_address" name="shipping_address" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" id="discription" cols="30" rows="3">{{ old('shipping_address') ?? $order->shipping_address }}</textarea> 
                                   </div>
                                   <div class="justify-center w-full md:w-2/3">
                                       <x-jet-label class="text-lg" for="billing_address" value="{{ __('Billing Address') }}" />
                                       <textarea id="billing_address" name="billing_address" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" id="discription" cols="30" rows="3">{{ old('billing_address') ?? $order->billing_address }}</textarea> 
                                   </div>
                                   <div class="mt-4 text-center">
                                       <x-jet-button class="">
                                           Update Order
                                       </x-jet-button>
                       
                                   </div>
                               </form>
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
    </div>
</x-dashboard-layout>