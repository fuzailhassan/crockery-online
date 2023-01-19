<x-dashboard-layout>
    <x-slot:heading>
                        Materials
                    </x-slot>
 
                <div class="flex flex-col sm:flex-row space-x-5">
                    <div class="sm:w-1/2 w-full px-4">
                        <h1 class="text-center text-3xl my-8 dark:text-white">
                            Add Material
                        </h1>         
                        <x-jet-validation-errors class="mb-4" />
             
                        <div class="overflow-auto flex flex-col my-4">
                            <form method="post" action="{{ route('materials.store')}}">
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
                                            <textarea id="description" name="description" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" id="discription" cols="30" rows="10">{{ old('discription') }}</textarea> 
                                        </div>
                                       
                                        <div class="flex justify-center mt-4">
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
                    <div class="sm:w-1/2 w-full px-4 py-4">
                        <h1 class="text-center text-3xl my-8 dark:text-white">
                           All materials
                        </h1>  
                        <div class="  ">
                            <ul class="flex flex-col justify-center m-8">
                                @foreach ($materials as $category)
                                <li class="flex justify-between mb-4 max-w-sm px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800 text-sm text-gray-600 dark:text-gray-400">
                                    {{ $category->name }}
                                    <span class="flex space-x-3 ">
                                        <a href="{{ route('materials.edit', $category) }}">
                                        <x-edit-icon />
                                        </a>
                                        <form action="{{ route('materials.destroy', $category) }}" method="post">
                                        <button>
                                            <x-trash-icon />
                                        </button>
                                        </form>

                                    </span>
                                </li>
                            @endforeach
    
                            </ul>

                        </div>
                        {!! $materials->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>