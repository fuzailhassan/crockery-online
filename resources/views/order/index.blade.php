<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">                
                <div class="overflow-scroll flex flex-col">
                    <h1 class="text-3xl text-center">
                        My Orders
                    </h1>
                    <table class="table-fixed border-collapse p-3 m-3 text-center"> 
                        <tr>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Order ID </th>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Order Total </th>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Order Status </th>
                            <th class="p-3 border border-white text-white bg-indigo-500"> </th>
                            
                        </tr>
                        
                           @foreach ($orders as $order)                           
                            <tr class="even:bg-indigo-50">
                                    <td class="p-3">{{ $order->id }}</td>
                                    <td class="p-3">{{ $order->order_total }}</td>
                                    <td class="p-3">{{ $order->order_status }}</td>
                                    <td class="p-3">
                                            <a href="{{ route('orders.show', $order) }}">
                                                View Details
                                            </a>
                                    </td>
                                    
                                    
                            </tr>
                           @endforeach 
                           
                       </table>

                </div>
                 
            </div>
        </div>
    </div>
</x-app-layout>