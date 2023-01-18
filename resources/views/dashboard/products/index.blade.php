<x-dashboard-layout>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 sm:p-8">                
                <div class="overflow-auto flex flex-col"> --}}
                    
                    @if ($message = Session::get('message'))
                    <div class="text-green-800" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
                        <p class="w-full text-center">{{ $message }}</p>
                    </div>
                @endif 
                        <x-slot:heading>
                            Products
                        </x-slot>
                    

                    <x-data-table>
                        <x-slot:head>
                            <th class="px-4 py-3"> ID </th>
                            <th class="px-4 py-3"> Name  </th>
                            <th class="px-4 py-3"> Price </th>
                            <th class="px-4 py-3"> Disconted </th>
                            <th class="px-4 py-3"> Discount</th>
                            <th class="px-4 py-3"> Action </th>                            

                        </x-slot>
                       
                            @foreach ($products as $product)                           
                             <tr class="text-gray-700 dark:text-gray-400">
                                     <td class="px-4 py-3">{{ $product->id }}</td>
                                     <td class="p-3 text-left">{{ $product->name }}</td>
                                     <td class="p-3">{{ $product->price }}</td>
                                     <td class="p-3">{{ $product->discounted ? 'Yes' : 'No' }}</td>
                                     <td class="p-3">{{ $product->discount }}</td>
                                     <td class="p-3 flex justify-center space-x-4">
                                         <a href="{{ route('products.edit', $product) }}">
                                             <x-edit-icon />
                                         </a>
                                         <form action="{{ route('products.destroy',$product->id) }}" method="post">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit">
                                                 <x-trash-icon />
                                             </button>
                                         
                                         </form>
                                     </td>
                             </tr>
                            @endforeach 
                        </x-data-table>
                            <div class="py-4">
                                {!! $products->links() !!}
     
                            </div>
                            
                            
                            
                {{-- </div>
                 
            </div>
        </div>
    </div> --}}
</x-dashboard-layout>