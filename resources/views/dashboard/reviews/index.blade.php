<x-dashboard-layout>
 
                    
                    @if ($message = Session::get('message'))
                    <div class="text-green-800" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
                        <p class="w-full text-center">{{ $message }}</p>
                    </div>
                @endif 
                        <x-slot:heading>
                            Reviews
                        </x-slot>
                    

                    <x-data-table>
                        <x-slot:head>
                            <th class="px-4 py-3"> Title  </th>
                            <th class="px-4 py-3"> Decription </th>
                            <th class="px-4 py-3"> Rating </th>
                            <th class="px-4 py-3"> Posted By </th>
                            <th class="px-4 py-3"> Product</th>
                            <th class="px-4 py-3"> Action </th>                            

                        </x-slot>
                       
                            @foreach ($reviews as $review)                           
                             <tr class="text-gray-700 dark:text-gray-400">
                                 <td class="p-3 text-left">{{ $review->title }}</td>
                                 <td class="p-3">{{ $review->description }}</td>
                                 <td class="px-4 py-3">{{ $review->rating }}</td>
                                     <td class="p-3">{{ $review->user->name }}</td>
                                     <td class="p-3">
                                        <a href="{{ route('products.show', $review->product) }}">
                                            {{ $review->product->name }}</td>
                                        </a>
                                     <td class="p-3 flex justify-center space-x-4">
                                         
                                         <form action="{{ route('reviews.destroy',$review->id) }}" method="post">
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
                                {!! $reviews->links() !!}
     
                            </div>
                            
                            
                            

</x-dashboard-layout>