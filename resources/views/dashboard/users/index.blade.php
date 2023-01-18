<x-dashboard-layout>

                    @if ($message = Session::get('message'))
                    <div class="text-green-800" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
                        <p class="w-full text-center">{{ $message }}</p>
                    </div>
                @endif 
                <x-slot:heading>
                        Users
                    </x-slot>
                   
                    <x-data-table>
                        <x-slot:head>
                       
                            <th class="px-4 py-3 "> ID </th>
                            <th class="px-4 py-3 "> Name  </th>
                            <th class="px-4 py-3 "> Email </th>
                            <th class="px-4 py-3 "> Admin </th>
                            <th class="px-4 py-3 "> Registered at</th>
                            <th class="px-4 py-3 "> Action </th>                            
                        
                        </x-slot>
                        {{-- @if ($orders === null)
                            <p> No Orders</p>
                        @endif --}}
                        
                           @foreach ($users as $user)                           
                            <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="p-3">{{ $user->id }}</td>
                                    <td class="p-3">{{ $user->name }}</td>
                                    <td class="p-3">{{ $user->email }}</td>
                                    <td class="p-3">{{ $user->isAdmin ? 'Yes' : 'No' }}</td>
                                    <td class="p-3">{{ $user->created_at }}</td>
                                    <td class="p-3 flex justify-center space-x-4">
                                        <a href="{{ route('users.edit', $user) }}">
                                            <x-edit-icon />
                                        </a>
                                        <form action="{{ route('users.destroy',$user->id) }}" method="post">
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
                       {!! $users->links() !!}


</x-dashboard-layout>