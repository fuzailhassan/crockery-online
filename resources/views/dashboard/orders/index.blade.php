<x-dashboard-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">                
                <div class="overflow-auto flex flex-col">
                    @if ($message = Session::get('message'))
                    <div class="text-green-800" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
                        <p class="w-full text-center">{{ $message }}</p>
                    </div>
                @endif 
                    <h1 class="text-3xl text-center">
                        Orders
                    </h1>
                    <table class="table-fixed border-collapse p-3 m-3 text-center"> 
                        <tr>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Order ID </th>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Order Total </th>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Order Status </th>
                            <th class="p-3 border border-white text-white bg-indigo-500"> </th>
                            
                        </tr>
                        {{-- @if ($orders === null)
                            <p> No Orders</p>
                        @endif --}}
                        
                           @foreach ($orders as $order)                           
                            <tr>
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
</x-dashboard-layout>