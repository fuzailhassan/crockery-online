<x-dashboard-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg sm:p-8">  
                <div class="flex flex-col sm:flex-row space-x-5">
                    <div class="sm:w-1/2 w-full px-4">
                        <h1 class="text-center text-3xl my-8">
                            Add Category
                        </h1>         
                        <x-jet-validation-errors class="mb-4" />
             
                        <div class="overflow-auto flex flex-col my-4">
                            <form method="post" action="{{ route('categories.store')}}">
                                @csrf                        
                                {{-- form sections --}}
                                <div class="flex flex-col text-lg sm:flex-row justify-center justify-items-center">
                                    {{-- form secton --}}
                                    <div class="flex flex-col space-y-6">
                                        <div class="">
                                            <x-jet-label for="name" value="{{ __('Name') }}" />
                                            <x-jet-input id="name" class="block mt-1 w-full p-3" type="text" name="name" :value="old('name')"   required autofocus autocomplete="name" />
                                        </div>
                                        <div class="ml-5">
                                            <x-jet-label for="description" value="{{ __('Description') }}" />
                                            <textarea id="description" name="description" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="discription" cols="30" rows="10">{{ old('discription') }}</textarea> 
                                        </div>
                                       
                                        <div class="flex justify-center">
                                            <x-jet-button class="text-center">
                                                Create
                                            </x-jet-button>
        
                                        </div>
                                        
                                    </div>
                                    {{-- form section --}}
                                    <div>
        
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    <div class="sm:w-1/2 w-full px-4">
                        <h1 class="text-center text-3xl my-8">
                            Categories
                        </h1>  
                        <ul class="flex flex-col justify-center m-8 max-h-full">
                            @foreach ($categories as $category)
                                <li class="flex justify-between px-3 py-2 my-3 bg-slate-200 rounded-md max-w-sm odd:bg-slate-50">
                                    {{ $category->name }}
                                    <span class="flex space-x-3">
                                        <a href="{{ route('categories.edit', $category) }}">
                                        <x-edit-icon />
                                        </a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="post">
                                        <button>
                                            <x-trash-icon />
                                        </button>
                                        </form>

                                    </span>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>