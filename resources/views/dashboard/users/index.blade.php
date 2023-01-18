<x-dashboard-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg sm:p-8">                
                <div class="overflow-auto flex flex-col">
                    @if ($message = Session::get('message'))
                    <div class="text-green-800" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
                        <p class="w-full text-center">{{ $message }}</p>
                    </div>
                @endif 
                    <h1 class="text-3xl text-center">
                        Users
                    </h1>
                    <table class="table-fixed border-collapse p-3 m-3 text-center"> 
                        <tr>
                            <th class="p-3 border border-white text-white bg-indigo-500"> ID </th>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Name  </th>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Email </th>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Admin </th>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Registered at</th>
                            <th class="p-3 border border-white text-white bg-indigo-500"> Action </th>                            
                        </tr>
                        {{-- @if ($orders === null)
                            <p> No Orders</p>
                        @endif --}}
                        
                           @foreach ($users as $user)                           
                            <tr class="odd:bg-indigo-50"">
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
                           
                       </table>
                       {!! $users->links() !!}

                </div>
                 
            </div>
        </div>
    </div>
</x-dashboard-layout>