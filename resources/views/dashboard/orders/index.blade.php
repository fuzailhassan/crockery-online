<x-dashboard-layout>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">                
                <div class="overflow-auto flex flex-col"> --}}
                    @if ($message = Session::get('message'))
                    <div class="text-green-800" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
                        <p class="w-full text-center">{{ $message }}</p>
                    </div>
                @endif 
                <x-slot:heading>
                    Orders
                </x-slot>
                    <x-data-table>
                        <x-slot:head>
                            <th class="px-4 py-3"> Order ID </th>
                            <th class="px-4 py-3"> Order Total </th>
                            <th class="px-4 py-3"> Order Status </th>
                            <th class="px-4 py-3"> Action </th>
                            
                        </x-slot>
                        {{-- @if ($orders === null)
                            <p> No Orders</p>
                        @endif --}}
                        
                           @foreach ($orders as $order)                           
                           <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-left">{{ $order->id }}</td>
                                    <td class="px-4 py-3 text-left">{{ $order->order_total }}</td>
                                    <td class="px-4 py-3 text-left">{{ $order->order_status }}</td>
                                    <td class="px-4 py-3 text-left">
                                            <a href="{{ route('orders.show', $order) }}">
                                                View Details
                                            </a>
                                    </td>
                                    
                                    
                            </tr>
                           @endforeach 
                           
                        </x-data-table>

                </div>
                 
            </div>
        </div>
    </div>
</x-dashboard-layout>