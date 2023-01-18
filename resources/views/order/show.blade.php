<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">                
                <div class="overflow-auto flex flex-col">
                    <h1 class="text-2xl text-center">
                        Order ID: {{ $order->id }}
                    </h1>
                    <h1 class="text-lg text-center">
                        Order Status: <b> {{ $order->order_status }}</b>
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
                           <tr>
                            <td></td>
                            <td></td>
                            <td>Order Total</td>
                            <td>Rs {{ $order->order_total }}</td>
                           </tr>
                           
                       </table>

                </div>
                 
            </div>
        </div>
    </div>
</x-app-layout>