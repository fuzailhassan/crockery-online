<x-dashboard-layout>
                   
                    @if ($message = Session::get('message'))
                    <div class="text-green-800" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
                        <p class="w-full text-center">{{ $message }}</p>
                    </div>
                @endif 
                        <x-slot:heading>
                            Feedbacks
                        </x-slot>
                    

                    <x-data-table>
                        <x-slot:head>
                            <th class="px-4 py-3"> ID </th>
                            <th class="px-4 py-3"> Title  </th>
                            <th class="px-4 py-3"> Description </th>
                            <th class="px-4 py-3"> Submitted By </th>
                            <th class="px-4 py-3"> Submitted On</th>
                            <th class="px-4 py-3"> Action </th>                            

                        </x-slot>
                       
                            @foreach ($feedbacks as $feedback)                           
                             <tr class="text-gray-700 dark:text-gray-400">
                                     <td class="px-4 py-3">{{ $feedback->id }}</td>
                                     <td class="p-3 text-left">{{ $feedback->title }}</td>
                                     <td class="p-3">{{ $feedback->description }}</td>
                                     <td class="p-3">{{ $feedback->user->name }}</td>
                                     <td class="p-3">{{ $feedback->created_at }}</td>
                                     <td class="p-3 flex justify-center space-x-4">
                                         {{-- <a href="{{ route('feedbacks.edit', $feedback) }}">
                                             <x-edit-icon />
                                         </a> --}}
                                         <form action="{{ route('feedbacks.destroy',$feedback) }}" method="post">
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
                                {!! $feedbacks->links() !!}
     
                            </div>
                            
                            

</x-dashboard-layout>